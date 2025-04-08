<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleBotController extends Controller
{
    public function proxyScript()
    {
        // URL of the external script
        $scriptUrl = 'https://salebot.pro/js/salebot.js?v=1';

        // Fetch the script content
        $scriptContent = file_get_contents($scriptUrl);

        // Check if script was fetched successfully
        if ($scriptContent === false) {
            abort(500, 'Unable to fetch the SaleBot script.');
        }

        // Set the appropriate headers
        return response($scriptContent, 200)
            ->header('Content-Type', 'application/javascript')
            ->header('Cross-Origin-Resource-Policy', 'same-origin');
    }
}
