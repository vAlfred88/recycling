<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use App\Place;

class PlaceController extends Controller
{
    public function show(Place $place)
    {
        return new PlaceResource($place);
    }
}
