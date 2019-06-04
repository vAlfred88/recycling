<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index()
    {
        $places = Place::paginate(20);
        return view('cities.index',compact('places'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $addresable = $place->addressable;
        return view('cities.show',compact('place','addresable'));
    }

    /**
     * Remove place.
     *
     * @param  Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return back();
    }
}
