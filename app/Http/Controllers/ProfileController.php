<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    //

    public function index() {

        if (Auth::check() && Auth::user()->role <= 3) {
            return view('profile');
        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('profile_new');
        } else {
            return redirect('/login');
        }
    }

    public function update(Request $request, User $user) {
        if (Auth::check()) {

            $user->prenom = $request->prenom;
            $user->nom = $request->nom;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->telephone = $request->telephone;

            if ($user->password != $request->password)
                $user->password = Hash::make($request->password);

            $user->save();

            return redirect('/profile?modified=true');
        } else {
            return redirect('/login');
        }
    }
}
