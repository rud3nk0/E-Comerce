<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doc-api', function () {
    return view('doca');
});

//Product Routes
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('product');

Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])
    ->name('product.create');

Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store'])
    ->name('product.store');

Route::get('/product/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
    ->name('product.edit');

Route::put('/product/{id}', [\App\Http\Controllers\ProductController::class, 'update'])
    ->name('product.update');

Route::delete('/product/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])
    ->name('product.destroy');


//Category Route
Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])
    ->name('category');

Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])
    ->name('category.create');

Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'store'])
    ->name('category.store');

Route::get('/category/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
    ->name('category.edit');

Route::put('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])
    ->name('category.update');

Route::delete('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
    ->name('category.destroy');


