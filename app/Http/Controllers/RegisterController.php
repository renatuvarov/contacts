<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class RegisterController extends Controller
{
    public function form()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request, Hasher $hash)
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hash->make($request->input('password')),
        ]);

        auth()->login($user);

        return redirect()->route('favorites');
    }
}
