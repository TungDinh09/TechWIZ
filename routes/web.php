<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FeedBackController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartControllerBeta;
// use App\Http\Controllers\WithlistProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\WishlistController;

Route::post('review', [ReviewController::class, 'insert']);
Route::get('send-mail', [MailController::class, 'index']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Wishlist

Route::get('/wishlist', [WishlistController::class,'show'])->name('wishlist');
Route::get('/wishlist/update/{id}', [WishlistController::class, 'changeFavorite']);
Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete']);


//cart console
Route::get('/show',[CartControllerBeta::class,'showCart']);
Route::get('/add/{id}/{quantity}',[CartControllerBeta::class,'addToCart']);
Route::get('/update/{id}/{quantity}',[CartControllerBeta::class,'updateToCart']);
Route::get('/delete/{id}',[CartControllerBeta::class,'deleteToCart']);
Route::get('/deleteall',[CartControllerBeta::class,'deleteAllCart']);

Route::post('/submit', [OrderController::class, 'submit']);



Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

Route::get('/login_register', function(){
    return view('login_register');
})->name('login_register');

// ------------------product---------------------------------------------------------------

Route::get('/product',[ProductController::class, 'index'])->name('product');
Route::post('/product',[ProductController::class, 'filter'])->name('product');
Route::get('/product/{id}',[ProductController::class, 'DetailIndex'])->name('product/detail');
Route::post('/search',[ProductController::class,'search'])->name('search');

// FeedBack -------------------------------------------------------

Route::get('/ContactUs', [FeedBackController::class , 'insert'])->name('contactus');
Route::post('/insert/feedback', [FeedBackController::class , 'insert'])->name('insert/feedback.post');
// Route::get('/update/feedback', [FeedBackController::class , 'edit'])->name('update/feedback.get');
// Route::patch('/update/feedback/{id}', [FeedBackController::class , 'update'])->name('update/feedback.post');
Route::get('/delete/feedback', [FeedBackController::class , 'delete'])->name('delete/feedback.get');
Route::delete('/delete/feedback/{id}', [FeedBackController::class , 'delete'])->name('delete/feedback.post');

// -------------------dashboard------------------------------------
Route::get('/dashboard', [DashBoardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



//----------------------------review--------------------------------------
Route::post('/review', [ReviewController::class, 'insert']);

Route::get('/whislist', [WithlistProductController::class, 'show'])->name('whislist');
Route::get('/whislist/insert/{id}', [WithlistProductController::class, 'insert'])->name('whislist/insert');
Route::get('/whislist/delete/{id}', [WithlistProductController::class, 'delete'])->name('whislist/delete');
//---------------------------------------------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// admin-------------------------------------------
// Route::get('admin/usermanagement', function(){
//  return view('/Admin/usermanagement');
// })->name('user_management');


Route::middleware('checkadmin')->group(function () {});
    Route::get('ordermanagement', function(){
        return view('Admin/OrderManagement');
    })->name('ordermanagement');

Route::get('ordermanagement', function(){
    return view('Admin/OrderManagement');
})->name('ordermanagement');


// Route::get('cart', function(){
//     return view('cart');
// })->name('cart');



Route::get('cart', [CartController::class,'cart'])->name('cart');

// Route::get('cartt', [CartController::class,'cartt']);

Route::get('add-to-cart/{Product_ID}', [CartController::class,'addToCart']);

Route::patch('update_cart', [CartController::class,'update'])->name('update.cart');

Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
// Route::delete('remove-from-cart', [CartController::class,'remove']);
// Route::get('remove-from-cart', function(){
//     session()->forget('cart');
// });


Route::get('ProductDetail', function(){
    return view('ProductDetail');
})->name('ProductDetail');




Route::get('/checkout',[OrderController::class, 'show'] )->name('checkout');

// Route::get('Checkout', function(){
//     return view('Checkout');
// })->name('checkout');
// Route::get('Checkout',[ProductController::class,'CheckOut']);
Route::post('/CheckIn',[ProductController::class,'CheckIn'])->name('CheckIn');


Route::get('/aaaa',[ProductController::class,'orderPlace']);