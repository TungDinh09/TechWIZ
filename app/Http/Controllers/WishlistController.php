<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show(){
        $userID = Auth::user()->UserID;
        $products = Product::join('wishlists','products.Product_ID','=','wishlists.Product_ID')
        ->where('UserID','=',$userID)
        ->select('products.*')
        ->get();
        foreach($products as $product){
            $product['image'] = Image::where('Product_ID', $product->Product_ID)->first('ImageLink');
        }
        return view('whishlist',compact('products'));
    }
    public function changeFavorite($id){
        $userID = Auth::user()->UserID;
        if (Wishlist::where('UserID', $userID)->where('Product_ID',$id)->exists()) {
            $this->delete($id);
            $response = [
                'success' => true,
                'message' => 'Đã xóa tym'
            ];
            return $response;
        } else {
            $wishlist = new Wishlist;
            $wishlist->UserID = $userID;
            $wishlist->Product_ID =$id;
            $wishlist->save();
            $response = [
                'success' => true,
                'message' => 'Đã tym'
            ];
            return $response;
        }
    }
    public function delete($id){
        $userID = Auth::user()->UserID;
        Wishlist::where('UserID', $userID)->where('Product_ID',$id)->delete();
        return redirect('/wishlist');
    }

}
