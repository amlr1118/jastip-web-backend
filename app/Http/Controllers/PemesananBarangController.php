<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Http\Resources\RiwayatBarangResource;
use App\Http\Resources\SemuaBarangResource;
use App\Models\ModelBarangKeluar;
use App\Models\ModelPemesananBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PemesananBarangController extends Controller
{
    //

    public function tampilkanDataPaketMasuk()
    {
        $barangs = ModelPemesananBarang::where('status', 0)
        ->orderBy('created_at','desc')->get();
        return BarangResource::collection($barangs);
    }

    public function tampilkanDetailPaketMasuk($id)
    {
        $barangs = ModelPemesananBarang::where('id', $id)
        ->orderBy('created_at','desc')->get();
        return SemuaBarangResource::collection($barangs);
    }

    public function updateStatusPaketMasuk(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ]);

        ModelPemesananBarang::where('id',$id)->update($validasi);

        return response()->json(['message' => 'Berhasil memproses barang ']);
    }

    public function tampilkanDataPengirimanPaket()
    {
        $barangs = ModelPemesananBarang::where('status', 1)
            ->where('dikirim', 0)
            ->orderBy('created_at','desc')->get();
        return BarangResource::collection($barangs);
    }

    public function tampilkanDataBarangKeluar()
    {
        $barangs = ModelBarangKeluar::with('relasiBarangMasuk')
            ->orderBy('created_at','desc')->get();
        return RiwayatBarangResource::collection($barangs);
    }

    public  function simpanBarangKeluar(Request $request)
    {
        // Membuat user baru dengan password yang sudah di-hash
        $barangs = ModelBarangKeluar::create([
            'kode_trans' => $request->kode_trans,
            'berat' => $request->berat,
            'ongkir' => $request->ongkir,
            'nama_kapal' => $request->nama_kapal,
            'estimasi_tiba' => $request->estimasi_tiba
        ]);

        return response()->json($barangs);
    }

    public function tampilkanDetailBarangKeluar($id)
    {
        $barangs = ModelBarangKeluar::with('relasiBarangMasuk')
            ->where('id', $id)
            ->orderBy('created_at','desc')->get();
        return RiwayatBarangResource::collection($barangs);
    }

    public function updateStatusPengirimanPaket(Request $request, $id)
    {
        $validasi = $request->validate([
            'dikirim' => 'required',
        ]);

        ModelPemesananBarang::where('id',$id)->update($validasi);

        return response()->json(['message' => 'Berhasil memproses barang ']);
    }

    public function batalkanPengirimanPaket(Request $request,$id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ]);

        ModelPemesananBarang::where('id',$id)->update($validasi);

        return response()->json(['message' => 'Berhasil membatalkan pengiriman paket']);
    }

    public function ambilPaket(Request $request,$id)
    {
        $validasi = $request->validate([
            'status' => 'required',
            'diambil' => 'required',
            'tanggal_diambil' => 'required'
        ]);

        ModelBarangKeluar::where('id',$id)->update($validasi);

        return response()->json(['message' => 'Berhasil mengambil paket']);
    }
}
