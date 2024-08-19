<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    //PayMe
    public function handleRequest(Request $request)
    {
        $method = $request->input('method');

        switch ($method) {
            case 'CheckTransaction':
                return $this->checkTransactionID($request);
            case 'CheckPerformTransaction':
                return $this->checkTransaction($request);
            case 'CreateTransaction':
                return $this->createTransaction($request);
            case 'PerformTransaction':
                return $this->performTransaction($request);
            case 'CancelTransaction':
                return $this->cancelTransaction($request);
            default:
                return response()->json(['error' => ['code' => -32601, 'message' => 'Method not found']], 400);
        }
    }

    public function checkTransactionID(Request $request){
        $transactionId = trim($request->input('params.id'));

        $payment = Payment::where('click_trans_id', $transactionId)->first();
        $time = Carbon::parse($payment->created_time);
        $perform = $payment->perform_time ? Carbon::parse($payment->perform_time) : null;
        $performTime = $perform ? $perform->valueOf() : 0; // Default to 0 if null

        if ($payment){
            return response()->json([
                'result' => [
                    'create_time' => $time->valueOf(),
                    'perform_time' => floor($performTime / 100) * 100,
                    'cancel_time' => 0,
                    'transaction' => "$payment->id",
                    'state' => $payment->status == 'completed' ? 2 : 1,
                    'reason' => null
                ]
            ]);
        } else {
            return response()->json(['error' => ['code' => -31003, 'message' => 'Transaction not found']], 404);
        }
    }

    public function checkTransaction(Request $request)
    {
        $transactionId = $request->input('params.account.orderID');
        $amount = $request->input('params.amount');

        // Find the transaction in the payments table
        $payment = Payment::where('order_id', $transactionId)->first();

        if ($payment && $payment->amount >= $amount) {
            return response()->json([
                'result' => [
                    'allow' => true,
                    'additional' => [
                        'shop' => 'LumenLux'
                    ],
                ]
            ]);
        } elseif($payment && $payment->amount != $amount) {
            return response()->json(['result' => ['allow' => -31001, 'message' => 'Неверная сумма.']], 404);
        } else{
            return response()->json(['result' => ['allow' => -31003, 'message' => 'Transaction not found']], 404);
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
            if ($payment->click_trans_id == 0 || $payment->click_trans_id == $transactionId) {
                $payment->update([
                    'click_trans_id' => $transactionId,
                    'amount' => $amount,
                    'created_time' => Carbon::createFromTimestampMs($time)->format('Y-m-d H:i:s.v'),
                ]);



                return response()->json([
                    'result' => [
                        'transaction' => "$payment->id",
                        'state' => 1,
                        'create_time' => $time
                    ]
                ]);
            } else {
                return response()->json(['error' => ['code' => -31099, 'message' => 'Transaction already paid']], 200);
            }
        }else{
            return response()->json(['result' => ['allow' => -31003, 'message' => 'Transaction not found']], 404);
        }

    }

    public function performTransaction(Request $request)
    {
        $transactionId = trim($request->input('params.id'));

        // Find the payment record by transaction ID
        $payment = Payment::where('click_trans_id', $transactionId)->first();

        if (!$payment) {
            return response()->json(['error' => ['code' => -31003, 'message' => 'Transaction not found']], 404);
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

        return response()->json([
            'result' => [
                'transaction' => $payment->id,
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

            $this->sendTelegramMessageAsync('Заказ №'.$merchantTransId.' успешно оплачен');

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

    protected function sendTelegramMessageAsync($message)
    {
        dispatch(function () use ($message) {
            try {
                Http::post("https://api.telegram.org/bot7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c/sendMessage", [
                    'chat_id' => -1002108174754,
                    'text' => $message,
                    'parse_mode' => 'HTML',
                ]);
            } catch (\Exception $e) {

            }
        })->afterResponse();
    }
}
