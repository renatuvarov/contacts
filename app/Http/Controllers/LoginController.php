<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

    public function login(Request $request, Hasher $hash)
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if (is_null($user) || ! $hash->check($request->input('password'), $user->password)) {
            return back()->withErrors(['errors' => 'непрвильный email или пароль'])->withInput();
        }

        auth()->login($user);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return redirect()->route('login.form');
    }
}
