<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $contacts = User::query()->where('id', '!=', $user->id)->get();

        return view('index', compact('contacts', 'user'));
    }
}
