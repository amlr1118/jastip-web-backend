<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'kode_transaksi' => $this->kode_transaksi,
            'nama_pengirim' => $this->nama_pengirim,
            'nomor_hp' => $this->nomor_hp,
            'alamat_pengiriman' => $this->alamat_pengiriman,
            'dikirim' => $this->dikirim,

        ];
    }
}
