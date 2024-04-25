<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Black Shirt',
                'price' => 19.99,
                'description' => 'Black Shirt',
                'category_id' => 2,
                'direction' => 'front',
                'image_front' => 'uploads/products/black_shirt_front.png',
                'image_back' => 'uploads/products/black_shirt_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'White Shirt',
                'price' => 19.99,
                'description' => 'White Shirt',
                'category_id' => 2,
                'direction' => 'front',
                'image_front' => 'uploads/products/white_shirt_front.png',
                'image_back' => 'uploads/products/white_shirt_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'Black Hoodie',
                'price' => 19.99,
                'description' => 'Black Hoodie',
                'category_id' => 1,
                'direction' => 'front',
                'image_front' => 'uploads/products/black_hoodie_front.png',
                'image_back' => 'uploads/products/black_hoodie_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'White Hoodie',
                'price' => 19.99,
                'description' => 'White Hoodie',
                'category_id' => 1,
                'direction' => 'front',
                'image_front' => 'uploads/products/white_hoodie_front.png',
                'image_back' => 'uploads/products/white_hoodie_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'Black Long Sleeve Shirt',
                'price' => 19.99,
                'description' => 'Black Long Sleeve Shirt',
                'category_id' => 2,
                'direction' => 'front',
                'image_front' => 'uploads/products/black_longsleeve_front.png',
                'image_back' => 'uploads/products/black_longsleeve_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'White Long Sleeve Shirt',
                'price' => 19.99,
                'description' => 'White Long Sleeve Shirt',
                'category_id' => 2,
                'direction' => 'front',
                'image_front' => 'uploads/products/white_longsleeve_front.png',
                'image_back' => 'uploads/products/white_longsleeve_back.png',
                'can_customize' => true,
                'bestseller' => false,
            ],
            [
                'name' => 'Black Instagram QR Shirt',
                'price' => 19.99,
                'description' => 'Black Instagram QR Shirt with Instagram handle...',
                'category_id' => 2,
                'direction' => 'back',
                'image_front' => 'uploads/products/black_qr_front.png',
                'image_back' => 'uploads/products/black_qr_back.png',
                'can_customize' => false,
                'bestseller' => true,
            ],
            [
                'name' => 'White Instagram QR Shirt',
                'price' => 19.99,
                'description' => 'White Instagram QR Shirt with Instagram handle...',
                'category_id' => 2,
                'direction' => 'back',
                'image_front' => 'uploads/products/white_qr_front.png',
                'image_back' => 'uploads/products/white_qr_back.png',
                'can_customize' => false,
                'bestseller' => true,
            ],
        ];

        $counter = 0;

        foreach ($products as $product) {
            $product['created_at'] = Carbon::now()->addSeconds($counter);
            $product['updated_at'] = Carbon::now()->addSeconds($counter);
            DB::table('products')->insert($product);
            $counter++;
        }
    }
}
