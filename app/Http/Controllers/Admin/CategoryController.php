<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(){
        $categories = Category::all();
        return view('Admin.CategoryManagement', compact('categories'));
    }
    public function insert(Request $request){
        if ($request->isMethod('get')) {
            return view('Admin.Create.CreateCategory');
        } else if ($request->isMethod('post')) {
            $request->validate([
                'name'=>'required'
            ]);
            $category = new Category;
            $category->CategoryName = $request->name;
            $category->save();
            return redirect('/admin/insert/category');
        }

    }
    public function update(Request $request,$id){
        if ($request->isMethod('get')) {
            $category =  Category::findOrFail($id);
            return view('Admin.Update.UpdateCategory',compact('category'));
        } else if($request->isMethod('patch')) {
            $request->validate([
                'name'=>'required'
            ]);
            $category = Category::find($id);
            $category->CategoryName = $request->name;
            $category->save();
            return redirect('/admin/show/category');
        }

    }
    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect('/admin/show/category');
    }
}
