<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartControllerBeta extends Controller
{
    public function showCart(Request $request){
        $carts = Session::get('Cart', []);
         return view('Cart',compact('carts'));
    }
    public  function addToCart($id,$quantity){
        $products = Product::with('image')->find($id);
        $cart = Session::get('Cart', []);
        $product = [
            'id' => $products->Product_ID,
            'name' => $products->Name,
            'quantity' => $quantity,
            'description' => $products->Description,
            'price' => $products->Price,
            'image' => $products->image->ImageLink
        ];
        if (array_key_exists($product['id'], $cart)) {
            $cart[$product['id']]['quantity'] += $product['quantity'];
        } else {
            $cart[$product['id']] = $product;
        }
        Session::put('Cart', $cart);
        return redirect('/show');
    }
    public function updateToCart($id,$quantity){
        $products = Product::with('image')->find($id);
        $cart = Session::get('Cart', []);
        $product = [
            'id' => $products->Product_ID,
            'name' => $products->Name,
            'quantity' => $quantity,
            'description' => $products->Description,
            'price' => $products->Price,
            'image' => $products->image->ImageLink
        ];
        $cart[$product['id']]['quantity'] = $product['quantity'];
        Session::put('Cart', $cart);
        if($quantity <= 0){
            unset($cart[$id]);
            Session::put('Cart', $cart);
            Session::save();
        }
        return redirect('/show');
    }
    public function deleteToCart($id){
        $cart = Session::get('Cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            Session::put('Cart', $cart);
            Session::save();
        }
        return redirect('/show');
    }
    public function deleteAllCart(){
        Session::forget('Cart');
        return redirect('/show');
    }
}
