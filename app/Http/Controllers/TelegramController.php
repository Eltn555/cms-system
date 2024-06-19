<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        $update = $request->all();

        // Check if the update contains a callback query
        if (isset($update['callback_query'])) {
            $callbackQuery = $update['callback_query'];
            $callbackData = $callbackQuery['data'];
            $message = $callbackQuery['message'];
            $chatId = $message['chat']['id'];
            $messageId = $message['message_id'];
            $messageText = $message['text'];

            // Extract idNumber from the first line of the message text
            $lines = explode("\n", $messageText);
            if (count($lines) > 0 && preg_match('/^Id:(\d+)/', $lines[0], $matches)) {
                $idNumber = $matches[1];
            } else {
                $idNumber = null;
            }

            if ($idNumber) {
                // Find the Sale model by idNumber
                $sale = Sale::find(69);
                if ($sale) {
                    // Update the status of the Sale model based on callback data
                    $sale->status = $callbackData; // assuming callbackData contains the new status
                    $sale->save();
                    $responseText = "Статус заказа с ID $idNumber изменен на $callbackData";
                    Log::info($responseText);
                } else {
                    $responseText = "Sale with ID: $idNumber not found.";
                    Log::warning($responseText);
                }
            } else {
                $responseText = "Invalid Sale ID.";
            }

            // Respond to the callback query
            $telegramBotToken = '7089662981:AAGLhqK0L3VeeOy2KLfeWo1zvswVogy3K_c';
            Http::post("https://api.telegram.org/bot{$telegramBotToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $responseText,
                'reply_to_message_id' => $messageId,
            ]);

            // Acknowledge the callback query
            Http::post("https://api.telegram.org/bot{$telegramBotToken}/answerCallbackQuery", [
                'callback_query_id' => $callbackQuery['id'],
                'text' => 'Button clicked!',
            ]);
        } else {
            Log::warning("No callback query found in the update.");
        }

        return response()->json(['status' => 'ok']);
    }
}
