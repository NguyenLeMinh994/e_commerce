<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        DB::table('products')->insert([[
            'title' => Str::random(10),
            'category_id' => 1,
            'price' => "100.0",
            'stock' => true,
            'brand' => Str::random(5),
            'image_url' => "https://picsum.photos/seed/picsum/200/300",
            'description' => Str::random(15),
        ],[
            'title' => Str::random(10),
            'category_id' => 1,
            'price' => "120.0",
            'stock' => true,
            'brand' => Str::random(5),
            'image_url' => "https://picsum.photos/seed/picsum/200/300",
            'description' => Str::random(15),
        ],[
            'title' => Str::random(10),
            'category_id' => 2,
            'price' => "120.0",
            'stock' => true,
            'brand' => Str::random(5),
            'image_url' => "https://picsum.photos/seed/picsum/200/300",
            'description' => Str::random(15),
        ],[
            'title' => Str::random(10),
            'category_id' => 2,
            'price' => "130.0",
            'stock' => true,
            'brand' => Str::random(5),
            'image_url' => "https://picsum.photos/seed/picsum/200/300",
            'description' => Str::random(15),
        ]]);
    }
}
