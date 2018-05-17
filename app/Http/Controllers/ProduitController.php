<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Fournisseur;
use App\Client;
use App\Produit;

class ProduitController extends Controller
{
    public function add() {

        if (Auth::check()) {
            $clients = DB::table('clients')->where('user_id','=', Auth::user()->id)->get();
            $fournisseurs = DB::table('fournisseurs')->where('user_id','=', Auth::user()->id)->get();

            return view('produits.addProduit', compact('clients', 'fournisseurs'));
        } else {
            return redirect('/login');
        }
    }

    public function show() {

        if (Auth::check()) {
            $clients = DB::table('clients')->where('user_id', '=', Auth::user()->id)->get();
            $fournisseurs = DB::table('fournisseurs')->where('user_id', '=', Auth::user()->id)->get();
            $produits = DB::table('produits')->where('user_id', '=', Auth::user()->id)->get();

            return view('produits.show', compact('clients', 'fournisseurs', 'produits'));
        } else {
            return redirect('/login');
        }
    }

    public function addCharge(Request $request, Fournisseur $fournisseur) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom' => 'required|min:5'],
                ['nom.required' => 'Le nom est obligatoire!'],
                ['nom.min' => 'Le min est 5 caracteres!']
            );

            $produit = new Produit;
            $produit->nom = $request->nom;
            $produit->description = $request->description;
            $produit->prix = $request->prix;
            $produit->type = $request->type;
        
            $user = Auth::user();

            $produit->user_id = $user->id;

            $fournisseur->produits()->save($produit);

            return view('charges.addCharge');

        } else {
            return redirect('/login');
        }

    }

    public function addRecette(Request $request, Client $client) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom' => 'required|min:5'],
                ['nom.required' => 'Le nom est obligatoire!'],
                ['nom.min' => 'Le min est 5 caracteres!']
            );

            $produit = new Produit;
            $produit->nom = $request->nom;
            $produit->description = $request->description;
            $produit->prix = $request->prix;
            $produit->type = $request->type;

            $user = Auth::user();

            $produit->user_id = $user->id;

            $client->produits()->save($produit);

            return view('recettes.addRecette');

        } else {
            return redirect('/login');
        }

    }

    public function delete(Produit $produit) {

        if (Auth::check()) {

            $produit->delete();

            return back();

        } else {
            return redirect('login');
        }

    }

    public function edit(Produit $produit) {

        if (Auth::check()) {

            $clients = DB::table('clients')->where('user_id', '=', Auth::user()->id)->get();
            $fournisseurs = DB::table('fournisseurs')->where('user_id', '=', Auth::user()->id)->get();

            return view('produits.editPage', compact('produit', 'clients', 'fournisseurs'));

        } else {
            return redirect('/login');
        }

    }

    public function update(Request $request, Produit $produit) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom' => 'required|min:5'],
                ['nom.required' => 'Le nom est obligatoire!'],
                ['nom.min' => 'Le min est 5 caracteres!']
            );

            $produit->nom = $request->nom;
            $produit->description = $request->description;
            $produit->prix = $request->prix;
            $produit->type = $request->type;

            $produit->save();

            return redirect('programmer');

        } else {
            return redirect('/login');
        }

    }

    
}
