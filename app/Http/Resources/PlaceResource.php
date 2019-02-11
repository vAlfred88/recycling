<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
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
            'formatted_address' => $this->address,
            'place_id' => $this->place,
            'geometry' => [
                'location' => [
                    'lat' => $this->lat,
                    'lng' => $this->lng
                ],
            ],
        ];
    }
}
