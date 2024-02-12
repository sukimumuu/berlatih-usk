<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/product', [ProdukController::class, 'index'])->name('product-index');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});


Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::get('/create-product', [ProdukController::class, 'create'])->name('product-create');
    Route::post('/store-product', [ProdukController::class, 'store'])->name('product-store');
    Route::get('/destroy-product/{id}', [ProdukController::class, 'destroy'])->name('product-destroy');
    Route::get('/edit-product/{id}', [ProdukController::class, 'edit'])->name('product-edit');
    Route::post('/update-product/{id}', [ProdukController::class, 'update'])->name('product-update');
    
    Route::get('/user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('/user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('/user-destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy');
});