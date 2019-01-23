<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'position' => optional($this->profile)->position,
            'phone' => optional($this->profile)->phone,
            'avatar' => $this->image,
            'role' => $this->roles,
            'permissions' => $this->permissions
        ];
    }
}
