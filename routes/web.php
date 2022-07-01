<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\NewreleaseController;
use App\Http\Controllers\backend\RegisterController;
use App\Http\Controllers\frontend\ProductsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontend routes

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[AboutController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('products/{title}',[ProductsController::class,'index']);
Route::get('productdetails/{id}',[ProductsController::class,'details'])->name('productdetails');


// backend routes

// login and logout routes

Route::get('/login',[LoginController::class,'index'])->middleware('alreadyLoggedIn');
Route::get('/register',[RegisterController::class,'index'])->middleware('alreadyLoggedIn');
Route::post('/register',[RegisterController::class,'store'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/login',[LoginController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/dashboard',[LoginController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[LoginController::class,'destroy']);

// homeslider routes

Route::get('/home-slider',[SliderController::class,'index'])->name('home-slider')->middleware('isLoggedIn');
Route::post('/home-slider', [SliderController::class, 'store'])->name('home-slider');
Route::get('edit-slider/{id}', [SliderController::class, 'edit'])->name('edit-slider');
Route::post('/edit-slider', [SliderController::class, 'update'])->name('edit-slider');
Route::delete('/delete-slider/{id}', [SliderController::class, 'delete'])->name('delete-slider');

// category routes

Route::get('/category', [CategoriesController::class, 'index'])->name('category')->middleware('isLoggedIn');
Route::post('/category-add', [CategoriesController::class, 'store'])->name('category-add');
Route::get('edit-cat/{id}', [CategoriesController::class, 'edit'])->name('edit-cat');
Route::post('/edit-cat', [CategoriesController::class, 'update'])->name('edit-cat');
Route::delete('/delete-category/{id}', [CategoriesController::class, 'delete'])->name('delete-category');


// Products routes

Route::get('/product', [ProductController::class, 'index'])->name('product')->middleware('isLoggedIn');
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::post('/edit-product', [ProductController::class, 'update'])->name('edit-product');
Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');

//New Release routes

Route::get('/new-release', [NewreleaseController::class, 'index'])->name('new-release')->middleware('isLoggedIn');
Route::post('/new-release', [NewreleaseController::class, 'store'])->name('new-release');
Route::get('edit-newproduct/{id}', [NewreleaseController::class, 'edit'])->name('edit-newproduct');
Route::post('/edit-newproduct', [NewreleaseController::class, 'update'])->name('edit-newproduct');
Route::delete('/delete-newproduct/{id}', [NewreleaseController::class, 'delete'])->name('delete-newproduct');
