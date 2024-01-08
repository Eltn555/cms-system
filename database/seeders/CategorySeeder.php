<?php

namespace Database\Seeders;

use Behat\Transliterator\Transliterator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Люстра',
            'Бра',
            'Торшер',
            'Одинарный люстра',
            'Подвесной люстра',
            'Галоген',
            'Магнитная система'
        ];

        foreach ($categories as $category) {
            $slug = Str::slug(Transliterator::transliterate($category), '-');
            DB::table('categories')->insert([
                'parent_category_id' => null, // Assuming top-level categories
                'order_id' => rand(1, 10), // Random order_id for example
                'title' => $category,
                'description' => Str::random(50), // Random string for description
                'image' => null, // Assuming no image
                'seo_title' => 'SEO Title for ' . $category,
                'seo_description' => 'SEO Description for ' . $category,
                'is_active' => true,
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
