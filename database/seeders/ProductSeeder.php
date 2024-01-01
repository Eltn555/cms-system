<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['ModernM 12W', 'Направленный свет Цвет свечения: 4200K Цвет корпуса: белый Modern M (9003 12W) 90*90*H90mm '],
            ['ModernM*1 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*1/12W 88*88*H74mm '],
            ['ModernM*1 20W', 'Направленный свет Цвет свечения: 3000K/4000K Цвет корпуса: белый/черный Modern M*1/20W 115*115*H83mm'],
            ['ModernM*2 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*2/12W 168*88*H74mm  '],
            ['ModernM*2 20W', 'Направленный свет Цвет свечения: 3000K/4000K Цвет корпуса: белый/черный Modern M*2/20W 216*115*H83mm'],
            ['ModernM*3 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*3/12W 247*88*H74mm '],
            ['ModernM*3 20W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*3/20W 317.5*115*H83mm '],
            ['ModernM*4 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*4/12W 168*168*H89mm '],
            ['ModernM*4 15W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый/черный Modern M*4/15W 168*168*H89mm '],
            ['ModernP*1 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый+черный Modern P*1 84*84*H82mm '],
            ['ModernP*2 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый+черный Modern P*1 84*160*H82mm '],
            ['ModernP*3 12W', 'Направленный свет Цвет свечения: 4000K Цвет корпуса: белый+черный Modern P*1 84*235*H82mm '],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert([
                'title' => $product[0],
                'short_description' => $product[1], // Assuming top-level categories
                'long_description' => Str::random(100), // Random string for description
                'price' => rand(100, 999) * 1000,
                'category_id' => rand(0, 5),
                'image' => null, // Assuming no image
                'seo_title' => 'SEO Title for ' . $product[0],
                'seo_description' => 'SEO Description for ' . $product[1],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
