<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('/dashboard', function () {
    return view('layout/Admin_Layout/dashboard', [
        'title' => "Dashboard",
        'folder'    => "Home",
    ]);
});
Route::get('/produk', function () {
    return view('layout/Admin_Layout/produk', [
        'title' => "Data Produk",
        'folder'    => "Produk",
    ]);
});
Route::get('/customer', [AdminController::class, 'dataCustomer']);


Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authentikasi']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);
