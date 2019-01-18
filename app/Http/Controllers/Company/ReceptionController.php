<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Reception;
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
        $receptions = auth()->user()->company->receptions()->latest()->paginate(20);

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->company->receptions()->create($request->all());

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
        $reception->save();

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
