<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class ProductOrder extends Model
{
    use HasFactory;
    protected $primaryKey = 'ProductOrderID';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }
}
