<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RiwayatBarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kode_trans' => $this->kode_trans,
            'nama_pengirim' => $this->relasiBarangMasuk->nama_pengirim,
            'nomor_hp' => $this->relasiBarangMasuk->nomor_hp,
            'alamat_pengiriman' => $this->relasiBarangMasuk->alamat_pengiriman,
            'berat' => $this->berat,
            'ongkir' => $this->ongkir,
            'nama_kapal' => $this->nama_kapal,
            'estimasi_tiba' => $this->estimasi_tiba,
            'status' => $this->status,
            'diambil' => $this->diambil,
            'tanggal_diambil' => $this->tanggal_diambil,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),

        ];
    }
}
