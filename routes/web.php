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
Route::get('/customer', function () {
    return view('layout/Admin_Layout/customer', [
        'title' => "Data Customer",
        'folder'    => "Customer",
    ]);
});
