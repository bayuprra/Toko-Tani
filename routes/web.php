<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{kategori}', 'kategori');
    Route::get('/{kategori}/{produk}', 'produk');
});

Route::controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard');

    // customer
    Route::get('/customer', 'dataCustomer');
    Route::post('/customer', 'storeProduk');
    Route::post('/updateCustomer/{id}', 'updateCustomer');
    Route::delete('/deleteCustomer/{id}', 'deleteCustomer')->name('deleteCustomer');

    // produk
    Route::get('/produk', 'dataProduk');
    Route::post('/produk', 'storeProduk');
    Route::post('/updateProduk/{id}', 'updateProduk');
    Route::delete('/deleteProduk/{id}', 'deleteProduk')->name('deleteProduk');

    // kategori
    Route::get('/kategori', 'kategoriProduk');
    Route::post('/kategori', 'storeKategori');
    Route::post('/updateKategori/{id}', 'updateKategori');
    Route::delete('/deleteKategori/{id}', 'deleteKategori')->name('deleteKategori');

    // merk
    Route::get('/merk', 'merkProduk');
    Route::post('/merk', 'storeMerk');
    Route::post('/updateMerk/{id}', 'updateMerk');
    Route::delete('/deleteMerk/{id}', 'deleteMerk')->name('deleteMerk');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authentikasi']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('auth');
