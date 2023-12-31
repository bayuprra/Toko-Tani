<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')
                ->constrained('produk');
            $table->foreignId('status_order_id')
                ->constrained('status_order');
            $table->foreignId('customer_id')
                ->constrained('customers');
            $table->integer('jumlah');
            $table->string('pembayaran');
            $table->integer('total_harga');
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
        Schema::dropIfExists('order');
    }
}
