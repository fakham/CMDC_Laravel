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

        if (Auth::check()) {
            return view('profile');
        } else {
            return redirect('/login');
        }
    }

    public function update(Request $request, User $user) {
        if (Auth::check()) {
            $user->update($request->all());

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/profile');
        } else {
            return redirect('/login');
        }
    }
}
