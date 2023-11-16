<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'order_id',
        'star',
        'review',
        'status'
    ];

    public function getReviewByMerk($merk)
    {
        return DB::table('review')
            ->join("order", 'review.order_id', '=', 'order.id')
            ->join("customers", 'customers.id', '=', 'order.customer_id')
            ->join("produk", 'produk.id', '=', 'order.produk_id')
            ->join("merk_produk", 'produk.merk_produk_id', '=', 'merk_produk.id')
            ->where('merk_produk.id', $merk)
            ->select('review.*', 'customers.nama as customerNama', 'merk_produk.id as merkId')
            ->where('review.status', '!=', 0)
            ->orderBy('review.updated_at', 'DESC')
            ->get();
    }

    public function getAvgReviewByMerk()
    {
        return DB::table('review')
            ->join('order', 'review.order_id', '=', 'order.id')
            ->join('produk', 'produk.id', '=', 'order.produk_id')
            ->join('merk_produk', 'produk.merk_produk_id', '=', 'merk_produk.id')
            ->select('merk_produk.id as merkId', DB::raw('COUNT(review.id) as jumlahReview'), DB::raw('SUM(review.star) as totalStar'))
            ->where('review.status', '!=', 0)
            ->groupBy('merk_produk.id')
            ->orderBy('merk_produk.id')
            ->get();
    }

    public function userReview()
    {
        return DB::table('review')
            ->join("order", 'review.order_id', '=', 'order.id')
            ->join("customers", 'customers.id', '=', 'order.customer_id')
            ->select('review.*', 'customers.nama as customerNama')
            ->where('review.star', 5)
            ->orderBy('review.updated_at', 'DESC')
            ->take(5)
            ->get();
    }
}
