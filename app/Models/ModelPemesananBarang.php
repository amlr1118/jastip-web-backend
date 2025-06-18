<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPemesananBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'kode_transaksi',
        'nama_pengirim',
        'nomor_hp',
        'alamat_pengiriman',
        'foto_produk',
    ];

    public function relasiBarangMasuk()
    {
        return $this->hasMany(ModelBarangKeluar::class);
    }
}
