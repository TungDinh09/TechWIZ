<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Session;
class DashBoardController extends Controller
{

    public function index(Request $request){

        $products = Product::all();
        foreach($products as $product){
            $product['image'] = Image::where('Product_ID', $product->Product_ID)->first('ImageLink');
        }
        return view('dashboard',compact('products'));
    }



}