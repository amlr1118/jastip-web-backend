<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_trans',
        'berat',
        'ongkir',
        'nama_kapal',
        'estimasi_tiba',
    ];
}
