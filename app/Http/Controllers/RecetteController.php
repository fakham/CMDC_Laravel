<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Recette;

class RecetteController extends Controller
{
    public function add() {

        $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->get();
        $clients = DB::table('clients')->where('user_id','=', Auth::user()->id)->get();

        return view('recettes/addRecette', compact('clients', 'produits'));
    }

    public function show() {

        $recettes = DB::table('recettes')->where('user_id', '=', Auth::user()->id)->get();

        return view('recettes/show', compact('recettes'));
    }

    public function store(Request $request) {

        $this->validate(
            $request,
            ['date' => 'required'],
            ['date.required' => 'La date est obligatoire!'],
            ['prix' => 'required|numeric'],
            ['prix.required' => 'Le prix est obligatoire!'],
            ['qtte' => 'required|numeric'],
            ['qtte.required' => 'La quantité est obligatoire!']
        );

        $recette = new Recette;
        $recette->date = $request->date;
        $recette->prix = $request->prix;
        $recette->qtte = $request->qtte;
        $recette->produit_id = $request->produit;
        $recette->fournisseur_id = $request->fournisseur;

        $user = Auth::user();

        $user->recettes()->save($recette);

        return redirect('/recettes');
    }
}
