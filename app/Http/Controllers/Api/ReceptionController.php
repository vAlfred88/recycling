<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReceptionResource;
use App\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Reception[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        if (auth()->user()->hasRole('owner')) {
            return auth()->user()->company->receptions;
        }
        return Reception::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reception $reception
     *
     * @return \App\Http\Resources\ReceptionResource
     */
    public function show(Reception $reception)
    {
        return new ReceptionResource($reception);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Reception $reception
     *
     * @return void
     */
    public function update(Request $request, Reception $reception)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
