<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    //PayMe
    public function handleRequest(Request $request)
    {
        $authHeader = $request->header('Authorization');
        $method = $request->input('method');


        if ($method != 'ChangePassword'){
            if (!$authHeader || strpos($authHeader, 'Basic ') !== 0) {
                return response()->json([
                    'error' => [
                        'code' => -32504,
                        'message' => 'Authorization header missing or invalid format'
                    ]
                ]);
            }

            $base64Credentials = substr($authHeader, 6);
            $decodedCredentials = base64_decode($base64Credentials);
            list($username, $password) = explode(':', $decodedCredentials, 2);

            $expectedPassword = env('PAYMEPASS');

            if ($password != $expectedPassword) {
                return response()->json([
                    'error' => [
                        'code' => -32504,
                        'message' => 'Unauthorized access: Invalid credentials',
                    ]
                ]);
            }
        }

        switch ($method) {
            case 'CancelTransaction':
                return $this->cancellation($request);
            case 'CheckTransaction':
                return $this->checkTransactionID($request);
            case 'GetStatement':
                return $this->getStatement($request);
            case 'CheckPerformTransaction':
                return $this->checkTransaction($request);
            case 'CreateTransaction':
                return $this->createTransaction($request);
            case 'PerformTransaction':
                return $this->performTransaction($request);
            default:
                return response()->json(['error' => ['code' => -32601, 'message' => 'Method not found']], 400);
        }
    }

    public function cancellation(Request $request){
        $id = $request->input('params.id');
        $reason = $request->input('params.reason');
        $payment = Payment::where('click_trans_id', $id)->first();
        $status = $payment->sale->status;

        if ($payment){
            if ($status == 'В ожидании') {
                $currentTime = Carbon::now();
                $formattedTime = $currentTime->format('Y-m-d H:i:s.v');

                if ($payment->cancelled_time){
                    $cancelled = $payment->cancelled_time ? Carbon::parse($payment->cancelled_time) : null;
                    $cancelled_time = $cancelled ? $cancelled->valueOf() : 0;
                    return response()->json([
                        'result' => [
                            'transaction' => $payment->order_id,
                            'cancel_time' => floor($cancelled_time / 100) * 100,
                            'state' => $payment->perform_time ? -2 : -1,
                        ]
                    ]);
                }else{
                    $payment->update([
                        'status' => 'failed',
                        'cancelled_time' => $formattedTime,
                        'info' => $reason,
                    ]);
                    $performTimeMillis = floor($currentTime->valueOf() / 100) * 100;
                    return response()->json([
                        'result' => [
                            'transaction' => $payment->order_id,
                            'cancel_time' => $performTimeMillis,
                            'state' => $payment->perform_time ? -2 : -1
                        ]
                    ]);
                }
            }else{
                return response()->json(['error' => ['code' => -31007, 'message' => 'Заказ выполнен. Невозможно отменить транзакцию.']], 200);
            }
        }else{
            return response()->json(['error' => ['code' => -31003, 'message' => 'Транзакция не найдена.']], 200);
        }
    }

    public function getStatement(Request $request){
        // Extract the 'from' and 'to' timestamps from the request
        $fromTime = $request->input('params.from');
        $toTime = $request->input('params.to');

        // Convert timestamps to datetime(3) format with milliseconds
        $fromDateTime = Carbon::createFromTimestampMs($fromTime)->format('Y-m-d H:i:s.u');
        $toDateTime = Carbon::createFromTimestampMs($toTime)->format('Y-m-d H:i:s.u');

        // Retrieve transactions within the specified time range
        $transactions = Payment::whereBetween('created_time', [$fromDateTime, $toDateTime])->whereHas('sale', function ($query){
            $query->where('payment', 'PayMe');
        })->get();

//        if ($transactions->isEmpty()) {
//            return response()->json([
//                'error' => [
//                    'code' => -32504,
//                    'message' => 'Transactions not found'
//                ]
//            ]);
//        }

        // Format the transactions for the response
        $formattedTransactions = $transactions->map(function ($payment) {
            $perform = $payment->perform_time ? Carbon::parse($payment->perform_time) : null;
            $performTime = $perform ? $perform->valueOf() : 0;
            $cancelled = $payment->cancelled_time ? Carbon::parse($payment->cancelled_time) : null;
            $cancelled_time = $cancelled ? $cancelled->valueOf() : 0;

            switch ($payment->status) {
                case 'completed':
                    $status = 2;
                    break;
                case 'pending':
                    $status = 1;
                    break;
                case 'failed':
                    $status = -2;
                    break;
                default:
                    $status = 0;
            }
            if ($payment->created_time && !$payment->perform_time && $payment->cancelled_time){
                $status = -1;
            }

            $reason = ($payment->info == null) ? null : intval($payment->info);

            $response = [
                'id' => $payment->click_trans_id,
                'time' => $payment->created_at->timestamp * 1000,  // Convert to milliseconds
                'amount' => $payment->amount,
                'account' => [
                    'orderID' => $payment->order_id,
                ],
                'create_time' => $payment->created_at->timestamp * 1000,
                'perform_time' => floor($performTime / 100) * 100,
                'cancel_time' => floor($cancelled_time / 100) * 100,
                'transaction' => $payment->order_id,
                'state' => $status,
                'reason' => $reason,
            ];

            if ($status >= 0) {
                $response['receivers'] = [
                    'id' => $payment->click_trans_id,
                    'amount' => $payment->amount,
                ];
            }

            return $response;
        });

        // Return the response in the required format
        return response()->json([
            'result' => [
                'transactions' => $formattedTransactions
            ]
        ]);
    }

    public function checkTransactionID(Request $request){
        $transactionId = trim($request->input('params.id'));

        $payment = Payment::where('click_trans_id', $transactionId)->first();

        if ($payment){
            $time = $payment->created_time ? Carbon::parse($payment->created_time) : null;
            $createdTime = $time ? $time->valueOf() : 0; // Default to 0 if null
            $perform = $payment->perform_time ? Carbon::parse($payment->perform_time) : null;
            $performTime = $perform ? $perform->valueOf() : 0; // Default to 0 if null
            $cancelled = $payment->cancelled_time ? Carbon::parse($payment->cancelled_time) : null;
            $cancelled_time = $cancelled ? $cancelled->valueOf() : 0;
            switch ($payment->status) {
                case 'completed':
                    $status = 2;
                    break;
                case 'pending':
                    $status = 1;
                    break;
                case 'failed':
                    $status = -2;
                    break;
                default:
                    $status = 0;
            }
            if ($payment->created_time && !$payment->perform_time && $payment->cancelled_time){
                $status = -1;
            }

            $reason = ($payment->info == null) ? null : intval($payment->info);

            return response()->json([
                'result' => [
                    'create_time' => $createdTime,
                    'perform_time' => floor($performTime / 100) * 100,
                    'cancel_time' => floor($cancelled_time / 100) * 100,
                    'transaction' => "$payment->order_id",
                    'state' => $status,
                    'reason' => $reason,
                ]
            ]);
        } else {
            return response()->json(['error' => ['code' => -31003, 'message' => 'Transaction not found']], 200);
        }
    }

    public function checkTransaction(Request $request)
    {
        $transactionId = $request->input('params.account.orderID');
        $amount = $request->input('params.amount');

        // Find the transaction in the payments table
        $payment = Payment::where('order_id', $transactionId)->first();

        if ($payment && $payment->amount*100 == $amount) {
            return response()->json([
                'result' => [
                    'allow' => true,
                    'additional' => [
                        'shop' => 'LumenLux'
                    ],
                ]
            ]);
        } elseif($payment && $payment->amount*100 != $amount) {
            return response()->json(['error' => ['code' => -31001, 'message' => 'Неверная сумма.']], 200);
        } else{
            return response()->json(['error' => ['code' => -31099, 'message' => 'Transaction not found']], 200);
        }
    }

    public function createTransaction(Request $request)
    {
        $transactionId = $request->input('params.id');
        $orderId = $request->input('params.account.orderID');
        $amount = $request->input('params.amount');
        $time = $request->input('params.time');

        // Check if transaction already exists
        $payment = Payment::where('order_id', $orderId)->first();

        if ($payment){
            if ($payment->amount*100 != $amount){
                return response()->json(['error' => ['code' => -31001, 'message' => 'Неверная сумма']], 200);
            }
            if ($payment->click_trans_id == 0 || $payment->click_trans_id == $transactionId || $payment->cancelled_time) {
                $payment->update([
                    'click_trans_id' => $transactionId,
                    'amount' => $amount/100,
                    'created_time' => Carbon::createFromTimestampMs($time)->format('Y-m-d H:i:s.v'),
                    'cancelled_time' => null,
                    'info' => null,
                    'status' => 'pending'
                ]);



                return response()->json([
                    'result' => [
                        'transaction' => "$payment->order_id",
                        'state' => 1,
                        'create_time' => $time
                    ]
                ]);
            } else {
                return response()->json(['error' => ['code' => -31099, 'message' => 'Transaction already paid']], 200);
            }
        }else{
            return response()->json(['error' => ['code' => -31099, 'message' => 'Transaction not found']], 200);
        }

    }

    public function performTransaction(Request $request)
    {
        $transactionId = trim($request->input('params.id'));

        // Find the payment record by transaction ID
        $payment = Payment::where('click_trans_id', $transactionId)->first();

        if (!$payment) {
            return response()->json(['error' => ['code' => -31099, 'message' => 'Transaction not found']], 200);
        }

        if ($payment->perform_time == null) {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d H:i:s.v');
            $payment->update([
                'status' => 'completed',
                'perform_time' => $formattedTime,
            ]);
            $performTimeMillis = floor($currentTime->valueOf() / 100) * 100;
        } else {
            $performTime = Carbon::parse($payment->perform_time);
            $performTimeMillis = floor($performTime->valueOf() / 100) * 100;
        }
        $address = $payment->sale->address_place;
        $name = $payment->sale->user->name;
        $this->sendTelegramMessageAsync("📍$address\n🧾  № $transactionId \n👤 $name\n💰$payment->amount сум\n🕓 $payment->updated_at\n🆔 $payment->click_trans_id\n✅ Успешно оплачен");

        return response()->json([
            'result' => [
                'transaction' => $payment->order_id,
                'perform_time' => $performTimeMillis,
                'state' => 2
            ]
        ]);
    }



    //Click
    public function preparePayment(Request $request)
    {
        $merchantTransId = $request->input('merchant_trans_id');
        $amount = $request->input('amount');

        // Verify the payment record exists and matches the amount
        $payment = Payment::where('order_id', $merchantTransId)->first();
        $clickID = $request->input('click_trans_id');

        if ($payment) {
            if ($payment->status === 'completed') {
                return response()->json([
                    'error' => -4,
                    'error_note' => 'Already paid',
                ]);
            }

            if ($payment->amount != $amount) {
                return response()->json([
                    'error' => -5,
                    'error_note' => 'Order not found or amount mismatch',
                ]);
            }

            return response()->json([
                'error' => 0,
                'error_note' => 'Success',
                'click_trans_id' => $clickID,
                'merchant_trans_id' => $payment->order_id,
                'merchant_prepare_id' => $payment->id,
            ]);
        } else {
            return response()->json([
                'error' => -5,
                'error_note' => 'Order not found or amount mismatch',
            ]);
        }
    }

    public function completePayment(Request $request)
    {
        $clickTransId = $request->input('click_trans_id');
        $merchantTransId = $request->input('merchant_trans_id');
        $amount = $request->input('amount');
        $error = $request->input('error');
        $errorNote = $request->input('error_note');

        // Verify the request
        $payment = Payment::where('order_id', $merchantTransId)->first();

        if ($payment && $payment->amount == $amount && $error == 0) {
            // Payment successful
            $payment->update([
                'status' => 'completed',
                'click_trans_id' => $clickTransId,
            ]);
            $name = $payment->sale->user->name;
            $address = $payment->sale->address_place;
            $this->sendTelegramMessageAsync("📍$address\n🧾  № $merchantTransId \n👤 $name\n💰$payment->amount сум\n🕓 $payment->updated_at\n🆔 $payment->click_trans_id\n✅ Успешно оплачен");

            return response()->json([
                'click_trans_id' => $clickTransId,
                'merchant_trans_id' => $merchantTransId,
                'merchant_confirm_id' => $payment->id,
                'error' => 0,
                'error_note' => 'Success',
            ]);
        } else {
            // Handle error
            $payment->update([
                'status' => 'failed',
            ]);

            return response()->json(['status' => 'error', 'message' => $errorNote]);
        }
    }

    //Uzum
    public function verifyUzumPayment(Request $request)
    {
        $merchantTransId = $request->input('params.Id');
        $serID = $request->input('serviceId');
        $servID = env('UZUM_ID');
        $body = json_encode(request()->all());
        if ($serID != $servID){
            return response()->json([
                'serviceId' => $serID,
                'timestamp' => Carbon::now()->valueOf(),
                'status' => 'FAILED',
                'errorCode' => '10006',
            ]);
        }

        // Verify the payment record
        $payment = Payment::where('order_id', intval($merchantTransId))->first();

        if ($payment && $payment->status == 'completed'){
            return response()->json([
                'serviceId' => $serID,
                'timestamp' => Carbon::now()->valueOf(),
                'status' => 'Already paid',
                'errorCode' => '10008',
            ]);
        }

        if ($payment) {
            return response()->json([
                'serviceId' => $serID,
                'timestamp' => Carbon::now()->valueOf(),
                'status' => 'OK',
            ]);
        }

        return response()->json([
            'serviceId' => $serID,
            'timestamp' => Carbon::now()->valueOf(),
            'status' => 'NOT FOUND',
            'errorCode' => '99999',
        ]);
    }

    public function createUzumPayment(Request $request)
    {
        $merchantTransId = $request->input('params.Id');
        $amount = $request->input('amount');
        $serID = $request->input('serviceId');
        $servID = env('UZUM_ID');
        $transID = $request->input('transId');

        if ($serID != $servID){
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'transTime' => Carbon::now()->valueOf(),
                'status' => 'FAILED',
                'errorCode' => '10006',
            ]);
        }

        // Verify the payment exists
        $payment = Payment::where('order_id', intval($merchantTransId))->first();
        if ($payment && $payment->amount == $amount) {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d H:i:s.v');
            $payment->update([
                'created_time' => $formattedTime,
                'click_trans_id' => $transID,
                'status' => 'pending'
            ]);
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'transTime' => Carbon::now()->valueOf(),
                'status' => 'CREATED',
                'amount' => $amount
            ]);
        }

        return response()->json([
            'serviceId' => $serID,
            'transId' => $transID,
            'transTime' => Carbon::now()->valueOf(),
            'status' => 'FAILED',
            'errorCode' => '10011',
        ]);
    }

    public function confirmUzumPayment(Request $request)
    {
        $serID = $request->input('serviceId');
        $servID = env('UZUM_ID');
        $transID = $request->input('transId');

        if ($serID != $servID){
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'transTime' => Carbon::now()->valueOf(),
                'status' => 'FAILED',
                'errorCode' => '10006',
            ]);
        }

        $payment = Payment::where('click_trans_id', $transID)->first();

        if ($payment && $payment->status == 'pending') {
                $currentTime = Carbon::now();
                $formattedTime = $currentTime->format('Y-m-d H:i:s.v');
                $payment->update([
                    'status' => 'completed',
                    'perform_time' => $formattedTime,
                ]);
            $name = $payment->sale->user->name;
            $address = $payment->sale->address_place;
            $this->sendTelegramMessageAsync("📍$address\n🧾  № $payment->order_id \n👤 $name\n💰$payment->amount сум\n🕓 $payment->updated_at\n🆔 $payment->click_trans_id\n✅ Успешно оплачен");
                return response()->json([
                    'serviceId' => $serID,
                    'transId' => $transID,
                    'status' => 'CONFIRMED',
                    'confirmTime' => Carbon::now()->valueOf(),
                    'amount' => $payment->amount
                ]);
        }

        return response()->json([
            'serviceId' => $serID,
            'transId' => $transID,
            'status' => 'FAILED',
            'confirmTime' => Carbon::now()->valueOf(),
            'errorCode' => '10003',
        ]);
    }

    public function uzumReverse(Request $request){
        $serID = $request->input('serviceId');
        $servID = env('UZUM_ID');
        $transID = $request->input('transId');

        if ($serID != $servID){
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'transTime' => Carbon::now()->valueOf(),
                'status' => 'FAILED',
                'errorCode' => '10006',
            ]);
        }

        $payment = Payment::where('click_trans_id', $transID)->first();

        if ($payment && $payment->sale->status == 'В ожидании') {
            $currentTime = Carbon::now();
            $formattedTime = $currentTime->format('Y-m-d H:i:s.v');
            $payment->update([
                'status' => 'failed',
                'cancelled_time' => $formattedTime,
            ]);
            $name = $payment->sale->user->name;
            $address = $payment->sale->address_place;
            $this->sendTelegramMessageAsync("📍$address\n🧾  № $payment->order_id \n👤 $name\n💰$payment->amount сум\n🕓 $payment->updated_at\n🆔 $payment->click_trans_id\n❌ Платеж отменен");
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'status' => 'REVERSED',
                'reverseTime' => Carbon::now()->valueOf(),
                'amount' => $payment->amount
            ]);
        } elseif($payment) {
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'status' => 'FAILED',
                'confirmTime' => Carbon::now()->valueOf(),
                'errorCode' => '10017',
            ]);
        }

        return response()->json([
            'serviceId' => $serID,
            'transId' => $transID,
            'status' => 'FAILED',
            'confirmTime' => Carbon::now()->valueOf(),
            'errorCode' => '10014',
        ]);
    }

    public function uzumStatus(Request $request){
        $serID = $request->input('serviceId');
        $servID = env('UZUM_ID');
        $transID = $request->input('transId');

        if ($serID != $servID){
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'transTime' => Carbon::now()->valueOf(),
                'status' => 'FAILED',
                'errorCode' => '10006',
            ]);
        }
        $payment = Payment::where('click_trans_id', $transID)->first();

        $time = $payment->created_time ? Carbon::parse($payment->created_time) : null;
        $createdTime = $time ? $time->valueOf() : 0; // Default to 0 if null
        $perform = $payment->perform_time ? Carbon::parse($payment->perform_time) : null;
        $performTime = $perform ? $perform->valueOf() : 0; // Default to 0 if null
        $cancelled = $payment->cancelled_time ? Carbon::parse($payment->cancelled_time) : null;
        $cancelled_time = $cancelled ? $cancelled->valueOf() : 0;
        switch ($payment->status) {
            case 'completed':
                $status = 'CONFIRMED';
                break;
            case 'pending':
                $status = 'CREATED';
                break;
            case 'failed':
                $status = 'REVERSED';
                break;
            default:
                $status = 'CREATED';
        }
        if ($payment) {
            return response()->json([
                'serviceId' => $serID,
                'transId' => $transID,
                'status' => $status,
                'transTime' => $createdTime,
                'confirmTime' => $performTime,
                'reverseTime' => $cancelled_time,
                'amount' => $payment->amount
            ]);
        }

        return response()->json([
            'serviceId' => $serID,
            'transId' => $transID,
            'status' => 'FAILED',
            'confirmTime' => Carbon::now()->valueOf(),
            'errorCode' => '10014',
        ]);
    }

    protected function sendTelegramMessageAsync($message)
    {
        dispatch(function () use ($message) {
            $tg = env('TG');
            try {
                $response = Http::post("https://api.telegram.org/bot{$tg}/sendMessage", [
                    'chat_id' => -1002108174754,
                    'text' => $message,
                    'parse_mode' => 'HTML',
                ]);
                if ($response->failed()) {
                    Log::error("Telegram API error: " . $response->body(), [
                        'message' => $message,
                    ]);
                }
            } catch (\Exception $e) {
                Log::error("Failed to send Telegram message: " . $e->getMessage(), [
                    'message' => $message,
                    'trace' => $e->getTraceAsString(),
                ]);
            }
        })->afterResponse();
    }
}
