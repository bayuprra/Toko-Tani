<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Merk extends Model
{
    use HasFactory;
    protected $table = 'merk_produk';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function produkSearch($produk)
    {
        return DB::table('merk_produk')
            ->where("merk_produk.nama", 'like', '%' . strtoupper($produk) . "%")
            ->rightJoin('produk', 'merk_produk.id', '=', 'produk.merk_produk_id')
            ->leftJoin('kategori_produk', 'produk.merk_produk_id', '=', 'kategori_produk.id')
            ->select('produk.merk_produk_id', 'produk.kategori_produk_id', 'produk.nama', 'produk.satuan', 'produk.harga', 'produk.qty', 'produk.gambar', 'kategori_produk.nama as kategori', 'merk_produk.nama as merk')
            ->groupBy('merk_produk.id');
    }
}
