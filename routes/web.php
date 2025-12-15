<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/',[HomeController::class,'index'])->name('home')->middleware('admin');

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::post('allproducts',[HomeController::class,'allproducts'])->middleware('auth');

Route::get('addproductview',[AdminController::class,'addproductview'])->name('addproductview')->middleware('adminCheck');

Route::post('/add-category', [AdminController::class, 'addCategory'])->name('add.category');

Route::get('/get-categories', [AdminController::class, 'getCategories'])->name('get.categories')->middleware('adminCheck');

Route::post('addproduct',[AdminController::class,'addproduct'])->name('addproduct');

Route::get('showproducts',[AdminController::class,'showproducts'])->name('showproducts')->middleware('adminCheck');

Route::get('edit-product-view/{id}',[AdminController::class,'editProductView'])->name('edit.product.view')->middleware('adminCheck');

Route::post('updateproduct/{id}',[AdminController::class,'updateproduct'])->name('update.product')->middleware('adminCheck');

Route::delete('delete-product/{id}',[AdminController::class,'deleteproduct'])->name('delete.product')->middleware('adminCheck');

Route::get('allproducts',[HomeController::class,'allproducts'])->name('product.sort');

Route::post('add-to-cart',[HomeController::class,'addToCart'])->name('add.to.cart')->middleware('auth');

Route::get('viewcart',[HomeController::class,'viewCart'])->name('view.cart')->middleware('auth');

Route::post('updateCart/{id}',[HomeController::class,'updateCart'])->name('update.cart')->middleware('auth');

Route::get('checkout',[HomeController::class,'checkout'])->name('checkout')->middleware('auth');

Route::post('placeOrder',[HomeController::class,'placeOrder'])->name('placeOrder')->middleware('auth');

Route::post('removeCartItem/{id}',[HomeController::class,'removeCartItem'])->name('remove.cart.item')->middleware('auth');

Route::get('vieworderlist',[AdminController::class,'viewOrderList'])->name('view.order.list')->middleware('adminCheck');

Route::delete('delete-order/{id}',[AdminController::class,'deleteOrder'])->name('delete.order')->middleware('adminCheck');

Route::post('update-order-status/{id}',[AdminController::class,'updateOrderStatus'])->name('update.order.status')->middleware('adminCheck');

Route::get('viewusers',[AdminController::class,'viewUsers'])->name('view.users')->middleware('adminCheck');

