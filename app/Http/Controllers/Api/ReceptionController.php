<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceptionResource;
use App\Reception;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Reception
     */
    public function store(Request $request)
    {
        $reception = new Reception($request->all());
        $reception->company_id = auth()->user()->company_id;
        $reception->save();

        if ($request->filled('users')) {
            $reception->users()->attach($request->get('users'));
        }

        if ($request->filled('services')) {
            $reception->services()->attach($request->get('services'));
        }

        if ($request->filled('periods')) {
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
        }

        if ($request->filled('place_id')) {
            $reception->place()->create($request->all());
        }

        return $reception;
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Reception $reception
     *
     * @return \App\Reception
     */
    public function update(Request $request, Reception $reception)
    {
        $reception->fill($request->all());

        if ($request->filled('users')) {
            $reception->users()->sync($request->get('users'));
        }

        if ($request->filled('services')) {
            $reception->services()->sync($request->get('services'));
        }

        if ($request->filled('periods')) {
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
        }

        if ($request->filled('place')) {
            if ($reception->place()->exists()) {
                $reception->place->fill($request->all());
                $reception->place->save();
            }
            $reception->place()->create($request->all());
        }

        $reception->save();

        return $reception;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function filter(Request $request)
    {
        $company = Company::query()->find($request->get('company_id'));
        if ($request->filled('city')) {
            $receptions = $company
                ->receptions()
                ->whereHas('place', function (Builder $builder) use ($request) {
                    $builder->where('city', $request->get('city'));
                })->get();

            return $receptions;
        }

        return $company->receptions;
    }
}
