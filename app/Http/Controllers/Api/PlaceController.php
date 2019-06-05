<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;
use App\Place;
use App\Reception;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function show(Place $place)
    {
        return new PlaceResource($place);
    }

    public function cityFilter(Request $request)
    {
        if ($request->filled('city')) {
            $receptions = Place::query()->where('city',$request->filled('get'))->with('addressable')->get();
        }
        return response()->json($receptions,200);
    }
}
