<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Repositories\MediaRepository;
use App\Http\Requests\CreateCompanyRequest;
use App\Place;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $company;

    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->company = new Company();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Company[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('company', Company::class);

        if (request()->ajax()) {
            return Company::doesntHave('owner')->get();
        }

        $companies = Company::paginate(20);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', $this->company);

        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CreateCompanyRequest $request)
    {
        $this->authorize('create', $this->company);

        $company = $this->company->create($request->all());

        if ($request->has('logo') && $request->file('logo')) {
            $media = new MediaRepository();
            $media->create($request->file('logo'), $company, 'companies/' . $company->id);
        }

        $company->place()->create($request->all());

        if ($request->with_owner && $request->has('with_owner')) {
            $owner = new User(
                [
                    'name' => $request->owner_name,
                    'email' => $request->owner_email,
                    'password' => 'secret',
                ]
            );

            $owner->save();

            $owner->assignRole('owner');

            $company->users()->save($owner);
        }

        if ($request->ajax()) {
           return response()->json(['redirect' => redirect(route('companies.index'))]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Company $company)
    {
        $this->authorize('view', $company);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     *
     * @return \App\Http\Resources\CompanyResource|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Company $company)
    {
        $this->authorize('update', $company);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $company->fill($request->all());
        $company->save();

        if ($company->place()->exists()) {
            $place = Place::find($company->place->id);

            $place->fill($request->all());
            $place->save();
        }

        if ($request->ajax()) {
            return response()->json(['message' => 'Company updated']);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Company $company)
    {
        $company->place->delete();
        $this->authorize('delete', $company);

        $company->delete();

        return back();
    }
}
