<?php

namespace App\Helpers;

use App\Models\Category;

class Helper
{
    public static function get_categories()
    {
        return Category::select('id', 'name')->orderBy('id', 'ASC')->get();
    }

    public static function get_sizes()
    {
        $sizes  = ['S', 'M', 'L'];
        return $sizes;
    }
}
