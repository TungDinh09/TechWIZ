<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class review extends Model
{
    use HasFactory;
    protected $primaryKey = 'ReviewID';
    protected $table = 'reviews';
    use HasFactory;
    public $fillable = [
        'Rating',
        'Comment',
        'UserID',
        'Product_ID'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}
