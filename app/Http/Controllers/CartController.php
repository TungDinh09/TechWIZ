<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // public function addToCart(Request $request){
    //     if(!$request->session()->has('cart')){
    //         $request->session()->put("cart",[]);
    //     }
    //     $cart1 = $request->session()->get('cart');
    //     array_push($cart1,[1,"Game","sp1",10,1000, 5]);
    //     $request->session()->put("cart",$cart1);
    //     $cart = $request->session()->get("cart");
    //     return $cart;
    // }
    // public function showCart(Request $request){

    //     if($request->session()->has('cart')){
    //         return $request->session()->get('cart');
    //     }
    // }
    // public function removeCart(Request $request){
    //     $request->session()->forget('cart');
    //     return "Xoa du lieu thanh cong";
    // }
    // public function removeAllCart(){

    // }

    // public function index()  // get all data from database
    // {
    //     $products = Product::all();

    //     return view('products', compact('products'));  //  show all data in page of products.blade.php
    // }

    // this function is to show cart of product because we wanna show result of choose product by user in this page
    public function cart()
    {
        // print_r(session('cart'));
        return view('cart');
    }



    public function addToCart($id) // by this function we add product of choose in card
    {
        $product = Product::with('image')->find($id);

        if(!$product) {

            abort(404);

        }
   // what is Session:
   //Sessions are used to store information about the user across the requests.
   // Laravel provides various drivers like file, cookie, apc, array, Memcached, Redis, and database to handle session data.
   // so cause write the below code in controller and tis code is fix
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->Name,
                        "quantity" => 1,
                        "price" => $product->Price,
                        "description" => $product->Description,
                        "image"=>$product->image->ImageLink,
                        // "photo" => $product->photo
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); // this code put product of choose in cart

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->Name,
            "quantity" => 1,
            "price" => $product->Price,
            "description" => $product->Description,
            "image"=>$product->image->ImageLink,
            // "photo" => $product->photo
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // update product of choose in cart

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {

        
        if($request->id && $request->quantity){
            $cart = session()->get('Cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('Cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('Cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('Cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


}