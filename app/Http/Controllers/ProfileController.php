<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ProfileController extends Controller
{
    //

    public function index() {
        return view('profile');
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect('../../profile');
    }
}
