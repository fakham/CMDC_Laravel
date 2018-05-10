<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function add() {
        return view('produits.addProduit');
    }

    public function show() {
        return view('produits.show');
    }
}
