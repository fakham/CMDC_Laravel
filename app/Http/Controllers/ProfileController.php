<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('../../profile');
    }
}
