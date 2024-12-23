<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Gate::authorize('manageUser',User::class); 
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        Gate::authorize('manageUser', User::class);
        return view('users.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('manageUser', User::class);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = user::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin == 'admin'
            ]
        );
        $user->where('id', $user->id)->update([
            'is_admin' => $request->is_admin == 'admin'
        ]);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        Gate::authorize('manageUser', User::class);
        return view('users.show', compact('user'));

    }

    public function edit(User $user)
    {
        Gate::authorize('manageUser', User::class);

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        Gate::authorize('manageUser', User::class);

        if (isset($request->password)) {
            $pw = $request->password;
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|',
                'password' => 'required|string|min:8|confirmed'
            ]);
        }else{
            $pw = $user->password;
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|'
            ]);
        }
        $user->where('id', $user->id)->update([
            "name" => $request->name,
            'email' => $request->email,
            'password' => $pw,
            'is_admin' => $request->is_admin == 'admin'
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        Gate::authorize('manageUser', User::class);
        $user->delete();
        return redirect()->route('users.index');
    }
}
