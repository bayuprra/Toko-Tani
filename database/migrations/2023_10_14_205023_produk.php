<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk_produk_id')
                ->constrained('merk_produk');
            $table->foreignId('kategori_produk_id')
                ->constrained('kategori_produk');
            $table->string('nama');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('qty');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
