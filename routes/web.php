<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authentikasi');
    Route::post('/logout', 'logout')->middleware('auth');
    Route::get('/register', 'register')->middleware('guest')->name('register');
    Route::post('/register', 'store');
});
// Route::get('/', [AuthController::class, 'login'])->name('login');



Route::controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    // customer
    Route::get('/customer', 'dataCustomer')->name('dataCustomer');
    Route::post('/customer', 'storeProduk');
    Route::post('/updateCustomer/{id}', 'updateCustomer');
    Route::delete('/deleteCustomer/{id}', 'deleteCustomer')->name('deleteCustomer');

    // produk
    Route::get('/produkss', 'dataProduk')->name('dataProdukAdmin');
    Route::post('/produkss', 'storeProduk');
    Route::post('/updateProduk/{id}', 'updateProduk');
    Route::delete('/deleteProduk/{id}', 'deleteProduk')->name('deleteProduk');

    // kategori
    Route::get('/kategori', 'kategoriProduk')->name('dataKategori');
    Route::post('/kategori', 'storeKategori');
    Route::post('/updateKategori/{id}', 'updateKategori');
    Route::delete('/deleteKategori/{id}', 'deleteKategori')->name('deleteKategori');

    // merk
    Route::get('/merk', 'merkProduk')->name('dataMerk');
    Route::post('/merk', 'storeMerk');
    Route::post('/updateMerk/{id}', 'updateMerk');
    Route::delete('/deleteMerk/{id}', 'deleteMerk')->name('deleteMerk');

    //order
    Route::get('/admin/order', 'dataOrder')->name('dataOrder');
    Route::get('/admin/transaksi', 'dataPembayaran')->name('dataPembayaran');
    Route::get('/admin/pengiriman', 'dataPengiriman')->name('dataPengiriman');
    Route::post('/admin/verifikasiPembayaran', 'verifikasiPembayaran')->name('verifikasiPembayaran');
    Route::post('/admin/verifikasiPengiriman', 'verifikasiPengiriman')->name('verifikasiPengiriman');
});


Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('user/{kategori}', 'kategori');
    Route::get('user/{kategori}/{produk}', 'produk');

    Route::get('user/produk/varian/data', 'getVarian')->name('getstok');
    Route::get('user/produk/varian/checkout', 'checkout')->name('copage')->middleware('loginUser');
    Route::get('profil', 'profil')->name('profil');
    Route::post('profil', 'editProfil');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('co/buynow', 'store')->name('buatOrder')->middleware('loginUser');
    Route::get('riwayat', 'riwayat')->name('riwayat')->middleware('loginUser');
    Route::post('uploadPembayaran', 'uploadPembayaran')->name('uploadPembayaran')->middleware('loginUser');
    Route::post('reuploadPembayaran', 'reuploadPembayaran')->name('reuploadPembayaran')->middleware('loginUser');
    Route::post('barangDiterima', 'barangDiterima')->name('barangDiterima')->middleware('loginUser');
    Route::post('beriReview', 'beriReview')->name('beriReview')->middleware('loginUser');
    Route::post('cancelOrder', 'cancelOrder')->name('cancelOrder')->middleware('loginUser');
});
