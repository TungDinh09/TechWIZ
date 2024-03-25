<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\PlantCategory;
class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'CategoryID';
    protected $table = 'categories';


    public $fillable = [
        'CategoryID',
        'CategoryName',
    ];

    public function plantCategories()
    {
        return $this->hasMany(PlantCategory::class, 'Product_ID');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}
