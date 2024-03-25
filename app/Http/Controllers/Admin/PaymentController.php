<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function show(){
        $payments = Payment::all();
        return view('Admin.PaymentManagement',compact('payments'));
    }

    public function insert(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Admin.Create.CreatePayment');
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'name'=>'required'
            ]);
            $payment = new Payment;
            $payment->PaymentName = $request->name;
            $payment->save();
            return redirect("/admin/show/payment");
        }

    }
    public function update(Request $request,$id){
        if ($request->isMethod('get')) {
            $payment = Payment::findOrFail($id);
            return view('Admin.Update.UpdatePayment',compact('payment'));
        } elseif ($request->isMethod('patch')) {
            $request->validate([
                'name'=>'required'
            ]);
            $payment = Payment::find($id);
            $payment->PaymentName = $request->name;
            $payment->save();
            return redirect("/admin/show/payment");
        }
    }
    public function delete(Request $request){
        $payment = Payment::find($request->id);
        $payment->delete();
        return redirect("/admin/show/payment");
    }
}
