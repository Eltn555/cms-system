<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['Hot Products', 1],
            ['New Arrivals', 1],
            ['Best Sellers', 1],
            ['Sale Items', 1],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
               'title'=>$tag[0],
               'visible' => $tag[1]
            ]);
        }
    }
}
