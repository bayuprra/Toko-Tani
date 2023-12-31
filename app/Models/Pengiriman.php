<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $fillable = [
        'order_id',
        'kurir',
        'no_resi',
        'status'
    ];

    function getAllOrder()
    {
        return DB::table('order')
            ->join('produk', 'produk.id', '=', 'order.produk_id')
            ->leftJoin('pembayaran', 'order.id', '=', 'pembayaran.order_id')
            ->leftJoin('pengiriman', 'order.id', '=', 'pengiriman.order_id')
            ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
            ->join('merk_produk', 'merk_produk.id', '=', 'produk.merk_produk_id')
            ->join('customers', 'customers.id', '=', 'order.customer_id')
            ->join('status_order', 'status_order.id', '=', 'order.status_order_id')
            ->select(
                'order.*',
                'produk.id as produkId',
                'produk.nama as produkNama',
                'produk.satuan as satuan',
                'produk.harga as harga',
                'produk.qty as qty',
                'produk.gambar as gambar',
                'status_order.nama as statusOrder',
                'status_order.id as statusOrderId',
                'merk_produk.nama as namaMerk',
                'kategori_produk.nama as namaKategori',
                'customers.nama as customerNama',
                'customers.phone as customerPhone',
                'customers.alamat as customerAlamat',
                'pembayaran.id as pembayaranId',
                'pembayaran.bukti as pembayaranBukti',
                'pembayaran.created_at as pembayaranTgl',
                'pengiriman.id as pengirimanId',
                'pengiriman.kurir as pengirimanKurir',
                'pengiriman.no_resi as pengirimanResi',
            )
            ->where('pengiriman.status', 0)
            ->orderBy('order.created_at', 'DESC')
            ->get();
    }
}
