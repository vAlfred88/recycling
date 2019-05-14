<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $reviews = $company->reviews;

        if (request()->ajax()) {
            return $reviews;
        }

        return view('front.reviews.index', compact('reviews', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Company $company
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Review|\Illuminate\Database\Eloquent\Model
     */
    public function store(Company $company, Request $request)
    {
        $review = $company->reviews()->create($request->all());
        $review->user()->associate(auth()->user());
        $review->save();

        return $review;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
