<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ProfileRepository;
use App\Mail\RegisterOwner;
use App\Mail\RegisterUser;
use App\Notifications\RegisterOwnerNotification;
use App\Notifications\RegisterUserNotification;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $validate = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        if(!empty($data['company_field']))
        {
            $validate = array_add($validate,'company' , ['required', 'string', 'min:1','unique:companies,name']);
        }

        return Validator::make($data, $validate);
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
            'password' => $data['password']
        ]);

        if (!empty($data['company'])) {
            $company = new Company(['name' => $data['company']]);
            $company->save();
            $user->company_id = $company->id;
            $user->save();
            $user->assignRole('owner');
            Mail::to($user->email)->send(new RegisterOwner($user,$company));

//            $user->notify(new RegisterOwnerNotification());
            $user->profile()->create();
            $user->profile->save();
            return $user;
        }
        $user->save();
//        $user->notify(new RegisterUserNotification());
        Mail::to($user->email)->send(new RegisterUser($user));

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
        return view('auth.join-site');
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
