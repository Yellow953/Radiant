<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Black Hoodie',
            'price' => 10,
            'quantity' => 10,
            'description' => 'Black Hoodie',
            'category_id' => 1,
            'image_front' => 'uploads/products/black_hoodie_front.png',
            'image_back' => 'uploads/products/black_hoodie_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Black Shirt',
            'price' => 10,
            'quantity' => 10,
            'description' => 'Black Shirt',
            'category_id' => 1,
            'image_front' => 'uploads/products/black_shirt_front.png',
            'image_back' => 'uploads/products/black_shirt_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Black Short Sleeve Shirt',
            'price' => 10,
            'quantity' => 10,
            'description' => 'Black Short Sleeve Shirt',
            'category_id' => 1,
            'image_front' => 'uploads/products/black_ss_front.png',
            'image_back' => 'uploads/products/black_ss_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'White Hoodie',
            'price' => 10,
            'quantity' => 10,
            'description' => 'White Hoodie',
            'category_id' => 1,
            'image_front' => 'uploads/products/white_hoodie_front.png',
            'image_back' => 'uploads/products/white_hoodie_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'White Shirt',
            'price' => 10,
            'quantity' => 10,
            'description' => 'White Shirt',
            'category_id' => 1,
            'image_front' => 'uploads/products/white_shirt_front.png',
            'image_back' => 'uploads/products/white_shirt_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'White Short Sleeve Shirt',
            'price' => 10,
            'quantity' => 10,
            'description' => 'White Short Sleeve Shirt',
            'category_id' => 1,
            'image_front' => 'uploads/products/white_ss_front.png',
            'image_back' => 'uploads/products/white_ss_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
