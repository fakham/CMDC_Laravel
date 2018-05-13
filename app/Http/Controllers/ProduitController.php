<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProduitController extends Controller
{
    public function add() {

        $clients = DB::table('clients')->get();

        return view('produits.addProduit', compact('clients'));
    }

    public function show() {
        return view('produits.show');
    }
}
