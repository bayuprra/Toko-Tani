<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'produk_id',
        'customer_id',
        'jumlah',
        'status',
        'pembayaran',
        'total_harga',
    ];

    function getOrderById($id)
    {
        return DB::table('order')
            ->join('produk', 'produk.id', '=', 'order.produk_id')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->join('merk_produk', 'merk_produk.id', '=', 'produk.merk_produk_id')
            ->select('order.*', 'produk.*', 'merk_produk.nama as namaMerk', 'kategori_produk.nama as namaKategori')
            ->where('order.customer_id', $id)
            ->get();
    }
}
