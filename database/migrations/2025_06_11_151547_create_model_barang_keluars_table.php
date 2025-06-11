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
        Schema::create('model_barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_trans')->index();
            $table->string('berat');
            $table->string('ongkir');
            $table->string('nama_kapal');
            $table->date('estimasi_tiba');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kode_trans')->references('kode_transaksi')->on('model_pemesanan_barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_barang_keluars');
    }
};
