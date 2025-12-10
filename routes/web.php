<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::post('allproducts',[HomeController::class,'allproducts']);

Route::get('addproductview',[AdminController::class,'addproductview'])->name('addproductview')->middleware('adminCheck');

Route::post('/add-category', [AdminController::class, 'addCategory'])->name('add.category');

Route::get('/get-categories', [AdminController::class, 'getCategories'])->name('get.categories')->middleware('adminCheck');

Route::post('addproduct',[AdminController::class,'addproduct'])->name('addproduct');
