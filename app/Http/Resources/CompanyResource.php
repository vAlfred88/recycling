<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'preview' => $this->logo,
            'description' => $this->description,
            'phone' => $this->phone,
            'site' => $this->site,
            'email' => $this->email,
            'address' => $this->address,
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'ogrn' => $this->ogrn,
            'place' => optional($this->place)->id,
            'route' => $this->route
        ];
    }
}
