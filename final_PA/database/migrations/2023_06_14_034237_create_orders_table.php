<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->string('nama');
            $table->integer('jumlah');
            $table->decimal('harga');
            $table->date('waktu_berkunjung');
            $table->string('gambar_bukti_pembayaran');
            $table->string('nomor_telepon');
            $table->string('status')->default('pending');
            $table->timestamps();
    
            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
