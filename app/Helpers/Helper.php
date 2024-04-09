<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Product;

class Helper
{
    public static function get_active_categories()
    {
        return Category::select('id', 'name')->where('active', true)->get();
    }

    public static function get_sizes()
    {
        $sizes  = ['S', 'M', 'L'];
        return $sizes;
    }

    public static function cart_count()
    {
        try {
            $cartItems = json_decode($_COOKIE['cart'], true) ?? [];
            return count($cartItems);
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function get_product($id)
    {
        return Product::find($id);
    }

    public static function get_shipping_cost()
    {
        return 0;
    }
}
