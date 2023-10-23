<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'merk_produk_id',
        'kategori_produk_id',
        'nama',
        'satuan',
        'harga',
        'qty',
        'gambar'
    ];

    public function getAllData()
    {
        return DB::table('produk')
            ->join('merk_produk', 'produk.merk_produk_id', '=', 'merk_produk.id')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->select('produk.*', 'kategori_produk.nama as kategori', 'merk_produk.nama as merk')
            ->get();
    }
}
