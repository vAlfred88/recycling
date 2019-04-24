<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'company' => ['nullable', 'string', 'min:1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if (!empty($data['company'])) {
            $company = new Company(['name' => $data['company']]);
            $company->save();
            $user->company_id = $company->id;
            $user->save();
            $user->assignRole('owner');
            return $user;
        }
        $user->save();
        $user->assignRole('user');
        return $user;
    }

    /**
     * Override register view
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('frontend.join-site');
    }

    /**
     * View for register company owner
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companyRegister()
    {
        return view('auth.company');
    }

    /**
     * View for register user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personRegister()
    {
        return view('auth.person');
    }
}
