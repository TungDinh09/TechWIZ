<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Request $request){
        // print_r($request->quantity);
        if(session('Cart')){
            $users = User::all();
        $deliveries = Delivery::all();
        $payments = Payment::all();
        return view('Checkout',['users'=>$users,'deliveries'=>$deliveries,'payments'=>$payments]);
        }else{
            
        }
        // print_r(session('Cart'));
       
        
    }
    public function showAdmin(Request $request){
        // print_r($request->quantity);
        $users = User::all();
            $deliveries = Delivery::all();
            $payments = Payment::all();
        return view('Admin.Create/CreateOrder',['users'=>$users,'deliveries'=>$deliveries,'payments'=>$payments]);
        
    }
    public function submit(Request $request){
        
        if (session()->has('cart')) {

                $orderID = Order::insertGetId([
                
                'OrderDate' => Carbon::now(),
                'total' => $request->grand_total,
                'UserName'=> $request->UserName,
                'Email'=> $request->Email,
                'phone'=>$request->phone,
                'OrderLocation'=>$request->OrderLocation,
                'StatusBill' => 'non_accept',
                'StatusDilevery' => 'prepare',
                'UserID' => Auth::user()->UserID,
                'DeliveryID' => $request->DeliveryID,
                'PaymentID' => $request->DeliveryID,
            ]);
                
                    $productOrderRecords = [];
                    // print_r($request->quantity);
                    foreach ($request->quantity as $id => $quantity) {
                        $product = Product::find($id); // Thay Product bằng model tương ứng
                        print_r($quantity);
                        if ($product) {
                        $productOrderRecords[] = [
                            "Quantity" => $quantity,
                            "Product_ID" => $id,
                            "Price" => $product->Price,
                            "total" => $product->price * $quantity,
                            "OrderID"=>$orderID,
                            "created_at" => now(),
                            "updated_at" => now(),
                        ];
                        }
                    }
                    
            
                    ProductOrder::insert($productOrderRecords);
                

            session()->forget('cart');
            
        }return  redirect()->route('dashboard');
        
    }
    public function update(Request $request){
        if ($request->isMethod('get')) {
            return view('Admin.Update.UpdateOrder');
        } elseif ($request->isMethod('post')) {
            
            return "This is a POST request.";
        }
        $order = Order::find(2);
        $order->Quantity = 100;
        $order->OrderDate = "2000-11-12";
        $order->total = 300;
        $order->StatusBill = 'non_accept';
        $order->StatusDilevery = 'prepare';
        $order->UserID = 1;
        $order->DeliveryID = 1;
        $order->PaymentID =1;
        $order->save();
        return "update thanh cong";

    }
    public function delete(){
        $order = Order::find(2);
        $order->delete();
        return "Delete thanh cong";
    }
}