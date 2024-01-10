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
            'name' => 'White Hoodie',
            'price' => 10,
            'quantity' => 10,
            'description' => 'White Hoodie',
            'category_id' => 1,
            'image_front' => 'assets/images/white_hoodie_front.png',
            'image_back' => 'assets/images/white_hoodie_back.png',
            'can_customize' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
