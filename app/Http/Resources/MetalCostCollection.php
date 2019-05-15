<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MetalCostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'metal',
                    'borderColor' => 'rgba(1, 175, 102, 1)',
                    'borderWidth' => 1,
                    'pointRadius' => 0,
                    'fill' => false,
                    'data' => $this->collection,
                ],
            ],
        ];
    }
}
