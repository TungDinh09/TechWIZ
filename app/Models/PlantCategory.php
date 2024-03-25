<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;
class PlantCategory extends Model
{
    use HasFactory;
    protected $table = 'plant_categories';
    public $fillable = [
        'Product_ID',
        'CategoryID',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }
}