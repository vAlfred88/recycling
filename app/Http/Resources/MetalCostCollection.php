<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'labels' => array_fill(0, $this->collection->count(), 'day'),
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
