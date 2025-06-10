<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Http\Resources\SemuaBarangResource;
use App\Models\ModelPemesananBarang;
use Illuminate\Http\Request;

class PemesananBarangController extends Controller
{
    //

    public function show()
    {
        $barangs = ModelPemesananBarang::orderBy('created_at','desc')->get();
        return BarangResource::collection($barangs);
    }

    public function tampilkanDetailBarang($id)
    {
        $barangs = ModelPemesananBarang::where('id', $id)
        ->orderBy('created_at','desc')->get();
        return SemuaBarangResource::collection($barangs);
    }
}
