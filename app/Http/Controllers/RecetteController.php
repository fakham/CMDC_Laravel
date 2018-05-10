<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function add() {
        return view('recettes/addRecette');
    }
}
