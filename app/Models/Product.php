<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\PlantCategory;
class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = 'Product_ID';
    public $fillable = [
        'Name',
        'Species',
        'Price',
        'quantity',
        'Discount',
        'Description'
    ];
    public function image()
    {
        return $this->hasOne(Image::class, 'Product_ID')->select(['Product_ID', 'ImageLink']);
    }
    public function images()
        {
            return $this->hasMany(Image::class, 'Product_ID')->select(['Product_ID', 'ImageLink']);
        }
    public function plantCategories()
    {
        return $this->hasMany(PlantCategory::class, 'Product_ID');
    }

}