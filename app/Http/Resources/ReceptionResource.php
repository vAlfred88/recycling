<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'phone' => $this->phone,
            'address' => $this->address,
            'users' => $this->users,
            'services' => $this->services()->pluck('id'),
            'lat' => $this->lat,
            'lng' => $this->lng,
            'periods' => $this->perionds
        ];
    }
}
