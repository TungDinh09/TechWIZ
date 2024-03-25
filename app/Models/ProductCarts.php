<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;


class product_carts extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductCartID';
    public $timestamps = false;

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'CartID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}
