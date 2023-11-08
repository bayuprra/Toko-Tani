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
    public function getDataById($id)
    {
        return DB::table('produk')
            ->join('merk_produk', 'produk.merk_produk_id', '=', 'merk_produk.id')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->where('produk.id', $id)
            ->select('produk.*', 'kategori_produk.nama as kategori', 'merk_produk.nama as merk')
            ->first();
    }

    public function produkByKategori($idKategori)
    {
        return DB::table('produk')->where('kategori_produk_id', $idKategori)
            ->join('kategori_produk', 'kategori_produk.id', '=', 'produk.kategori_produk_id')
            ->join('merk_produk', 'merk_produk.id', '=', 'produk.merk_produk_id')
            ->select('produk.merk_produk_id', 'produk.kategori_produk_id', 'produk.nama', 'produk.satuan', 'produk.harga', 'produk.qty', 'produk.gambar', 'kategori_produk.nama as kategori', 'merk_produk.nama as merk')
            ->groupBy('merk_produk_id');
    }

    public function produkByKategoriMerkId($idKategori, $idMerk)
    {
        return DB::table($this->table)
            ->where('kategori_produk_id', $idKategori)
            ->where('merk_produk_id', $idMerk)
            ->get();
    }
}
