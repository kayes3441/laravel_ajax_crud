<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/add-product', [HomeController::class, 'addProduct'])->name('add.product');
Route::post('/update-product', [HomeController::class, 'updateProduct'])->name('update.product');
Route::post('/delete-product', [HomeController::class, 'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data', [HomeController::class, 'pagination'])->name('pagination.product');
Route::get('/search-product', [HomeController::class, 'searchProduct'])->name('search.product');
