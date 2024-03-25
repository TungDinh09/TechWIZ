<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
class DeliveryController extends Controller
{
    public function show(){
        $deliveries = Delivery::all();
        return view('Admin.DeliveryManagement', compact('deliveries'));
    }
    public function insert(Request $request){
        if($request->isMethod('get')){
            return view('Admin.Create/CreateDelivery');
        }else if($request->isMethod('post')){
            $request->validate([
                'name'=>'required'
            ]);
            $delivery = new Delivery;
            $delivery->Name = $request->name;
            $delivery->save();
        }
        return redirect("/admin/insert/delivery");
        }
    public function update(Request $request,$id){
        if($request->isMethod('get')){
            $delivery = Delivery::findOrFail($id);
            return view('Admin.Update.UpdateDelivery',compact('delivery'));
        }else if($request->isMethod('patch')){
            $request->validate([
                'name'=>'required'
            ]);
            $delivery = Delivery::find($id);
            $delivery->Name = $request->name;
            $delivery->save();
            return redirect("/admin/show/delivery");
        }

    }
    public function delete(Request $request){
        $delivery = Delivery::find($request->id);
        $delivery->delete();
        return redirect('/admin/show/delivery');
    }
}
