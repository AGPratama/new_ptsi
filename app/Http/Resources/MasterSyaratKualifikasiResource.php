<?php

namespace App\Http\Resources;

use App\Http\Resources\MasterSyaratKualifikasiDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MasterSyaratKualifikasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

}
