<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'ImageID';
    protected $table = 'images';
    public $fillable = [
        'ImageLink',
        'Product_ID'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}
