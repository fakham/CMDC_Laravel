<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class ChargeController extends Controller
{
    public function add() {

        $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->get();
        $fournisseurs = DB::table('fournisseurs')->where('user_id','=', Auth::user()->id)->get();

        return view('charges/addCharge', compact('produits', 'fournisseurs'));
    }

    public function show() {
        return view('charges/show');
    }
}
