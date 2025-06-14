<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('model_pemesanan_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->string('kode_transaksi')->unique();
            $table->string('nama_pengirim');
            $table->string('nomor_hp');
            $table->string('alamat_pengiriman');
            $table->string('foto_produk');
            $table->boolean('status')->default(false);
            $table->boolean('dikirim')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_pemesanan_barangs');
    }
};
