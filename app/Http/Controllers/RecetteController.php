<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Recette;

class RecetteController extends Controller
{
    public function add() {

        if (Auth::check()) {

            $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->get();
            $clients = DB::table('clients')->where('user_id','=', Auth::user()->id)->get();

            return view('recettes.addRecette', compact('clients', 'produits'));

        } else {
            return redirect('/login');
        }
    }

    public function show() {

        if (Auth::check()) {

            $recettes = DB::table('recettes AS R')
            ->select("R.id AS id", "R.date AS date", "R.prix AS prix", "R.qtte AS qtte", "C.nom AS client", "P.nom AS produit")
            ->join('clients AS C', 'R.client_id', '=', 'C.id')
            ->join('produits AS P', 'R.produit_id', '=', 'P.id')
            ->where('R.user_id', '=', Auth::user()->id)
            ->get();

            return view('recettes.show', compact('recettes'));

        } else {
            return redirect('/login');
        }
    }

    public function store(Request $request) {

        if (Auth::check()) {

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

        } else {
            return redirect('/login');
        }
    }

    public function delete(Recette $recette) {

        if (Auth::check()) {

            $recette->delete();

            return back();

        } else {
            return redirect('/login');
        }

    }

    public function edit(Recette $recette) {

        if (Auth::check()) {

            $clients = DB::table('clients')->where('user_id', '=', Auth::user()->id)->get();
            $produits = DB::table('produits')->where('user_id', '=', Auth::user()->id)->get();
            
            return view('recettes.edit', compact('charge', 'clients', 'produits'));

        } else {
            return redirect('/login');
        }
    }

    public function update(Request $request, Recette $recette) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['date' => 'required'],
                ['date.required' => 'La date est obligatoire!'],
                ['prix' => 'required|numeric'],
                ['prix.required' => 'Le prix est obligatoire!'],
                ['qtte' => 'required|numeric'],
                ['qtte.required' => 'La quantité est obligatoire!']
            );

            $recette->update($request->all());

            return redirect('/recettes');

        } else {
            return redirect('/login');
        }

    }
}
