<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('browse', User::class);
        $users = User::get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add', User::class);
        $roles = Role::getAssignableRoles();
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('add', User::class);
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required |unique:users,username',
            'email' => 'required | email | unique:users,email',
            'password' => 'required',
            'dateOfBirth' => 'required | date'
        ]);


        try {
            DB::beginTransaction();
            $user = new User;
            $user->fill($request->except('_token'));
            $user->save();

            $user->roles()->attach($request->get('roles'));
            DB::commit();
        } catch (QueryException $ex) {
            DB::rollback();
            return back()->withErrors("Houston!! We've a problem. Please check your data");
        }

        return redirect()->route('user.index')
            ->with('success', 'User' . $user->name . 'successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('read', Auth::user());
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('edit', Auth::user());
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $this->authorize('edit', Auth::user());
        $data = $request->except('_token');

        if(is_null($data['password']))
            unset($data['password']);

        $user->update($data);
        $result = $user->save();

        if (!$result)
            return back()->with('warning', 'Fail to update user details');
        else
            return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('add', User::class);
        $user->delete();
    }
}
