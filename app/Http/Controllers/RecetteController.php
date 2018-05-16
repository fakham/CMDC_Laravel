<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class RecetteController extends Controller
{
    public function add() {

        $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->get();
        $clients = DB::table('clients')->where('user_id','=', Auth::user()->id)->get();

        return view('recettes/addRecette', compact('clients', 'produits'));
    }

    public function show() {
        return view('recettes/show');
    }
}
