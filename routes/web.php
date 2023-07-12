<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('/home2', function () {
//      return view('home2');
//  });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Product

Route::get('/home', [App\Http\Controllers\ProductsController::class, 'show_products']);
Route::post('/add_product', [App\Http\Controllers\ProductsController::class, 'add_product']);
Route::get('/product_id/{id}', [App\Http\Controllers\ProductsController::class, 'product_id'])->middleware('role:admin');
Route::post('/edit_product/{id}', [App\Http\Controllers\ProductsController::class, 'edit_product']);
Route::get('/delete_product/{id}', [App\Http\Controllers\ProductsController::class, 'delete_product'])->middleware('role:admin');


//Category
 Route::get('/category', [App\Http\Controllers\CategoriesController::class, 'show_category']);
 Route::post('/add_category', [App\Http\Controllers\CategoriesController::class, 'add_category']);
 Route::get('/category_id/{id}', [App\Http\Controllers\CategoriesController::class, 'category_id']);
 Route::post('/edit_category/{id}', [App\Http\Controllers\CategoriesController::class, 'edit_category']);
 Route::get('/delete_category/{id}', [App\Http\Controllers\CategoriesController::class, 'delete_category']);

 Route::get('/search', [ProductsController::class, 'search'])->name('search');
