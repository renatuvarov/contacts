<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContactRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $favorites = $user->favorites;

        return view('favorites', compact('user', 'favorites'));
    }

    public function addContact(AddContactRequest $request)
    {
        $user = $request->user();
        $user->favorites()->attach($request->input('contact_id'));

        return redirect()->route('favorites');
    }
}
