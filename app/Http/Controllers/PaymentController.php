<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Payment;

class PaymentController extends Controller
{
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

        $response = Http::post("https://api.telegram.org/bot{7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c}/sendMessage", [
            'chat_id' => 791430493,
            'text' => $errorNote,
            'parse_mode' => 'HTML',
        ]);
        // Verify the request
        $payment = Payment::where('order_id', $merchantTransId)->first();

        if ($payment && $payment->amount == $amount && $error == 0) {
            // Payment successful
            $payment->update([
                'status' => 'completed',
                'click_trans_id' => $clickTransId,
            ]);

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
}
