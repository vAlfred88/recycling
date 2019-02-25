<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Reception;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receptions = auth()->user()->company->receptions()->with('periods')->latest()->paginate(20);

        return view('company::receptions.index', compact('receptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company::receptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reception = new Reception($request->all());
        $reception->company_id = auth()->user()->company_id;
        $reception->save();
        $reception->services()->attach($request->get('services'));

        if ($request->has('users')) {
            $reception->users()->sync(array_pluck($request->get('users'), 'id'));
        }

        foreach ($request->get('periods') as $period) {
            $reception->periods()->create(
                [
                    'day' => $period['open']['day'],
                    'open' => Carbon::parse($period['open']['time']),
                    'close' => Carbon::parse($period['close']['time']),
                    'reception_id' => $reception->id,
                ]
            );
        }

        $reception->place()->create($request->all());

        if ($request->ajax()) {
            return response(['message' => 'Reception created']);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        return view('company::receptions.show', compact('reception'));
    }

    public function showMap()
    {
        $receptions = Reception::all();

        return view('company::receptions.map', compact('receptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        return view('company::receptions.edit', compact('reception'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reception $reception)
    {
        $reception->fill($request->all());
        $place = $reception->place;
        $place->fill($request->except('place'));
        $place->save();
        $reception->save();

        if ($request->ajax()) {
            return 'success';
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reception $reception
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        $reception->delete();

        return back();
    }
}
