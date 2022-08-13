<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('product.home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/products/show/{id}',[App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::patch('/products/edit/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

 
