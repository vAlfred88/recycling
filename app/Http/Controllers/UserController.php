<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserModel;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\SendEmailRequest;
use App\Http\Resources\UserResource;
use App\Media;
use App\Notifications\UserInvite;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        //        $this->authorize('view', User::class);

        $users = User::query()->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::pluck('name', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param \Illuminate\Http\Request $request
     *
     * @param \App\Http\Repositories\UserRepository $repository
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, UserRepository $repository)
    {
        $this->authorize('create', User::class);
        $user = new User;

        $repository->create($request, $user);

        $user->notify(new UserInvite());

        return redirect()->back()->with('flash', 'Пользователь успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(User $user)
    {
        $this->authorize('show', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \App\Http\Resources\UserResource|\App\User|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (request()->ajax()) {
            return new UserResource($user);
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->has('password') && $request->get('password') != '') {
            $user->password = $request->get('password');
        }

        $user->fill($request->except('password'));
        $user->save();

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('user_roles'));
        }

        if ($request->has('company')) {
            $user->company()->associate($request->input('company'))->save();
        }

        if ($request->has('avatar')) {
            if ($request->file('avatar')) {
                $avatar = new Media(
                    [
                        'path' => $request->file('avatar')->store("avatars/$user->id"),
                        'name' => $user->name,
                    ]
                );
                $avatar->save();

                if ($user->avatar()->exists()) {
                    $user->avatar()->delete();
                }

                $user->avatar()->save($avatar);
            }
        }

        $user->notify(new UserInvite());

        if ($request->ajax()) {
            return response(204);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('flash', 'Пользователь успешно удален');;
    }

    /**
     * Deprecated send email to foo user
     *
     * @param SendEmailRequest $request
     */
    public function sendMail(SendEmailRequest $request)
    {
        (new User)->forceFill([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ])->notify(new UserInvite());


    }
}
