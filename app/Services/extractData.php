<?php

namespace App\Services;

use App\Models\Product;

class extractData
{
    //for special usage
    public function massInsert()
    {
        $batchSize = 100;
        $processed = 0;
        $page = 0;

        do {
            $products = Product::select('id', 'additional')
                ->whereNotNull('additional')
                ->skip($page * $batchSize)
                ->take($batchSize)
                ->get();

            $count = $products->count();
            if ($count === 0) break;

            foreach ($products as $product) {
                $data = $this->extractData($product->additional);
                // Use query builder for direct update (faster, no events)
                if($data['watt'] && $data['lumen'] && $data['kelvin']){ // if the data is not null
                    Product::where('id', $product->id)->update([
                        'watt' => $data['watt'],
                        'lumen' => $data['lumen'],
                        'kelvin' => $data['kelvin'],
                    ]);
                    usleep(100000); // sleep 0.1 second
                }
                $processed++;
                echo "$processed - {$product->id} - {$data['watt']} - {$data['lumen']} - {$data['kelvin']}\n";
            }
            echo "Page: $page\n, Processed: $processed\n";
            $page++;
        } while ($count === $batchSize);
    }

    public function extractData($data)
    {
        $result = [
            'watt' => null,
            'lumen' => null,
            'kelvin' => null,
        ];

        // Load HTML
        $dom = new \DOMDocument();
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $data); // suppress warnings

        $rows = $dom->getElementsByTagName('tr');
        foreach ($rows as $row) {
            
            $cols = $row->getElementsByTagName('td'); // sample: <td>1000 lm</td>
            if ($cols->length < 2) continue; // skip if there is no second column
            
            $value = trim($cols->item(1)->textContent); // get the text of the second column

            // Watt: look for number followed by w
            if (preg_match('/(\\d{1,6})\\s*w/i', $value, $m) && !$result['watt']) { // if the value is a number followed by w
                $result['watt'] = (int)$m[1]; // set the watt
            }
            // Lumen: look for number followed by lm
            if (preg_match('/(\\d{1,6})\\s*lm/i', $value, $m) && !$result['lumen']) { // if the value is a number followed by lm
                $result['lumen'] = (int)$m[1]; // set the lumen
            }
            // Kelvin: look for number followed by k (optionally with ° or CCT)
            if (preg_match('/(\\d{3,6})\\s*k/i', $value, $m) && !$result['kelvin']) { // if the value is a number followed by k
                $result['kelvin'] = (int)$m[1]; // set the kelvin
            }
        }
        return $result;
    }
}
