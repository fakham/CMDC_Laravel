<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('home');
        } else {
            return redirect('/login');
        }
    }

    public function control()
    {
        if (Auth::user()->role >= 3)
            return redirect('/');
        
        $users = DB::table('users')->get();

        return view('admin.control', compact('users'));
        
    }

    public function updateRole(Request $request, User $user) {

        if (Auth::user()->role >= 3)
            return redirect('/');

        $user->update($request->all());

        $user->admin = Auth::user()->id;

        $user->save();

        return redirect('/control');

    }
}
