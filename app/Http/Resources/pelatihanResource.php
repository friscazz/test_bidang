<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class pelatihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_pelatihan' => $this->nama_pelatihan,
            'jenis_pelatihan' => $this->jenis_pelatihan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
