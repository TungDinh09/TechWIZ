<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Middleware\checkAdmin;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FeedBackController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Auth\AuthController;



Route::get('/login',[AuthController::class,'viewLogin']);

Route::middleware('checkadmin')->group(function () {
    Route::get('/', function(){
        return view('Admin/Home');
    });

    Route::get('/insert/category',[CategoryController::class,'insert']);
    Route::post('/insert/category',[CategoryController::class,'insert']);
    Route::get('/update/category/{id}',[CategoryController::class,'update']);
    Route::patch('/update/category/{id}',[CategoryController::class,'update']);
    Route::delete('/delete/category',[CategoryController::class,'delete']);
    Route::get('/show/category',[CategoryController::class,'show']);

    Route::post('/insert/order',[OrderController::class,'insert']);
    Route::get('/update/order',[OrderController::class,'update']);
    Route::get('/delete/order',[OrderController::class,'delete']);
    Route::get('/show/order',[OrderController::class,'showAdmin']);

    Route::get('/insert/delivery',[DeliveryController::class,'insert']);
    Route::post('/insert/delivery',[DeliveryController::class,'insert']);
    Route::get('/update/delivery/{id}',[DeliveryController::class,'update']);
    Route::patch('/update/delivery/{id}',[DeliveryController::class,'update']);
    Route::delete('/delete/delivery',[DeliveryController::class,'delete']);
    Route::get('/show/delivery',[DeliveryController::class,'show']);

    Route::get('/insert/payment',[PaymentController::class,'insert']);
    Route::post('/insert/payment',[PaymentController::class,'insert']);
    Route::get('/update/payment/{id}',[PaymentController::class,'update']);
    Route::patch('/update/payment/{id}',[PaymentController::class,'update']);
    Route::delete('/delete/payment',[PaymentController::class,'delete']);
    Route::get('/show/payment',[PaymentController::class,'show']);

    Route::get('/insert/review',[ReviewController::class,'insert']);
    Route::get('/update/review',[ReviewController::class,'update']);
    Route::get('/delete/review',[ReviewController::class,'delete']);
    Route::get('/show/review',[ReviewController::class,'show']);

    // Route::post('/show/product',[ProductController::class,'filterAdmin']);
    Route::get('/addproduct',[ProductController::class,'create'])->name('addproduct');
    Route::get('/insert/product',[ProductController::class,'insert']);
    Route::post('/insert/product',[ProductController::class,'insert']);
    Route::get('/update/product/{id}',[ProductController::class,'update']);
    Route::patch('/update/product/{id}',[ProductController::class,'update']);
    Route::delete('/delete/product',[ProductController::class,'delete']);
    Route::post('/filter/product',[ProductController::class,'filterAdmin'])->name('admin.filter.product');
    Route::get('/show/product',[ProductController::class,'show']);

    Route::get('/insert/feedback',[FeedBackController::class,'insert']);
    Route::get('/update/feedback',[FeedBackController::class,'update']);
    Route::get('/delete/feedback',[FeedBackController::class,'delete']);
    Route::get('/show/feedback',[FeedBackController::class,'show']);

    Route::get('/insert/user',[UserController::class,'insert']);
    Route::post('/insert/user',[UserController::class,'insert']);
    Route::get('/update/user',[UserController::class,'update']);
    Route::post('/delete/user',[UserController::class,'delete']);
    Route::get('/show/user',[UserController::class,'show']);
    Route::post('/filter/user',[UserController::class,'filter'])->name('admin.filter.user');

    Route::get('/insert/role',[RoleController::class,'insert']);
    Route::get('/update/role',[RoleController::class,'update']);
    Route::get('/delete/role',[RoleController::class,'delete']);
    Route::get('/show/role',[RoleController::class,'show']);

});


    // Route::get('/', function () {
    //     return view('Admin.HomePage');
    // });
    // Route::get('/adminLogin', function () {
    //     return view('Admin.Auth.login');
    // });
    // Route::get('/adminRegister', function () {
    //     return view('Admin.Auth.register');
    // });
    // Route::get('/adminProfile', function () {
    //     return view('Admin.Auth.profile');
    // });


    // Route::get('/usermanagement', function () {
    //     return view('/Admin/usermanagement');
    // })->name('user_management');
    // Route::get('addproduct', function(){
    //     return view('Admin/AddProduct');
    // })->name('addproduct');


    // Route::get('admin/payment/create', function(){
    //     return view('Admin/AddProduct');
    // })->name('payment/create');


    // Route::match(['get', 'post'], '/adminlogin1', [LoginController::class, 'login'])->name('admin.login');
    // Route::middleware('auth:admin')->group(function (){
    //     Route::get('/admin', [HomeController::class, 'index'])->name('dashboard');
    // });

    // Route::get('/', function () {
    //     return view('Admin.HomePage');
    // });
?>