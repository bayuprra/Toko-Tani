<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_produk';
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nama',
        'deskripsi'
    ];
}
