<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBack;
use Illuminate\Support\Facades\Auth;

class FeedBackController extends Controller
{
    public  function show(){
        $feedbacks = FeedBack::all();
        return view('Admin.FeedbackManagement',compact('feedbacks'));
    }
    public  function insert(Request $request){
        if ($request->isMethod('get')) {
            return view('ContactUs');
        } elseif ($request->isMethod('post')) {

            $request -> validate(['content'=>'required']);
            $feedback = new FeedBack;
            $feedback->FeedbackContent = $request->content;
            $feedback->UserID = Auth::user()->UserID;
            $feedback->save();
            return view('ContactUs');
        }
       
        

    }
    public function edit(Request $request){
        return view('Admin.Update.UpdateFeedback');
    }
    public function update(Request $request, $id){
        $feedback = FeedBack::find($id);
        $feedback->FeedbackContent = $request->FeedbackContent;
        $feedback->save();
        return "update thanh cong";
    }
    public  function delete(Request $request){
        $feedback = FeedBack::find($request->FeedbackID);
        $feedback->delete();
        return redirect('/admin/show/feedback');
    }
}
