<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function show(){
        $reviews = Review::all();
        return view('Admin.ReviewManagement',compact('reviews'));
    }
    public function insert(Request $request){
        if ($request->isMethod('get')) {
            return view('Admin.Create.CreateReview');
        } elseif ($request->isMethod('post')) {

            
        $review = new Review;
        $review->Rating = $request->Rating;
        $review->Comment = $request->Comment;
        $review->UserID = Auth::user()->UserID;
        $review->Product_ID = $request->Product_ID;
        $review->save();
        return redirect()->route('/');
        }
        
    }
    public function edit(Request $request){
        return view('Admin.Update.UpdateReview');
    }
    public function update(Request $request, $id){
        $review = Review::find($id);
        $review->Rating = Str($request->Rating);
        $review->Comment = $request->Comment;
        $review->UserID = session('UserID');
        $review->Product_ID = $request->Product_ID;
        $review->save();
        return "update thanh cong";
    }
    public function delete(Request $request){
        $review = Review::find($request->ReviewID);
        $review->delete();
        return "delete thanh cong";
    }
}