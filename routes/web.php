<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;

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
Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/check-login', [AuthController::class,'check'])->name('check');

Route::middleware(['auth','level:admin'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/product', [ProdukController::class, 'index'])->name('product-index');
    Route::get('/create-product', [ProdukController::class, 'create'])->name('product-create');
    Route::post('/store-product', [ProdukController::class, 'store'])->name('product-store');
    Route::get('/destroy-product/{id}', [ProdukController::class, 'destroy'])->name('product-destroy');
    Route::get('/edit-product/{id}', [ProdukController::class, 'edit'])->name('product-edit');
    Route::post('/update-product/{id}', [ProdukController::class, 'update'])->name('product-update');
    
});