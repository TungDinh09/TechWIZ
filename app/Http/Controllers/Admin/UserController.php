<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller

{


    
    public function show(){
        $users = User::all();
        return view('Admin.UserManagement',compact('users'));
    }
    public function insert(Request $request){
        if ($request->isMethod('get')) {
            return view('Admin.Create.CreateUser');
        }elseif ($request->isMethod('post')) {
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'password'=>'required'
            ]);
            $user =  new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
         //   $user->RoleID = 1;
            $user->password = Hash::make($request->password);
            $user->save();
            return "Insert thanh cong";
        }
    }
    public function filter(Request $request){
        $users = User::all();
            
    // Loại bỏ các bản ghi trùng lặp dựa trên Product_ID
            if($request->search != null){
               $users= $users->where('users.name','=','like', '%' . $request->search . '%');
            }
                
            if($request->sort == 'A_Z'){
                $users = $users->sortBy(function ($item) {
                return $item->name;
            });
            }elseif($request->sort == 'Z_A'){
                $users = $users->sortByDesc(function ($item) {
                return $item->name;
                });
            }

        
        return view('Admin.UserManagement',compact('users'));

    }
    public function update(Request $request){
        if ($request->isMethod('get')) {
            return view('Admin.Update.UpdateUser');
        }elseif ($request->isMethod('post')) {
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'password'=>'required'
            ]);
            $user =  User::find(1);
            $user->name = "PhamQuan1";
            $user->email = "quanqqq11@gmail.com";
            $user->phone = "0322233878";
            $user->RoleID = 1;
            $user->password = "qqqq111";
            $user->save();
        return "Update thanh cong";
            return "Insert thanh cong";
        }

    }
    public function delete(Request $request){
        $user =  User::find($request->id);
        $user->delete();
        return "Delete  thanh cong";
    }
}