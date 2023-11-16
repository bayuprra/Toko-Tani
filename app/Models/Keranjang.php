<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    public $timestamps = false;

    protected $fillable = [
        'produk_id',
        'customer_id',
        'jumlah'
    ];

    public function getById($id)
    {
        return DB::table('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->join('merk_produk', 'produk.merk_produk_id', '=', 'merk_produk.id')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->where('keranjang.customer_id', $id)
            ->select(
                'produk.*',
                'kategori_produk.nama as kategori',
                'merk_produk.nama as merk',
                'keranjang.jumlah as keranjangJumlah',
                'keranjang.id as keranjangId'
            )
            ->get();
    }
}
