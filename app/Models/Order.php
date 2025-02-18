<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    } //end of user

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')->withPivot('quantity', 'size', 'design_id');
    } //end of products

}
