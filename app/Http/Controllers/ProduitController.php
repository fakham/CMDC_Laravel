<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Fournisseur;
use App\Client;
use App\Produit;

class ProduitController extends Controller
{
    public function add() {

        $clients = DB::table('clients')->get();
        $fournisseurs = DB::table('fournisseurs')->get();

        return view('produits.addProduit', compact('clients', 'fournisseurs'));
    }

    public function show() {
        return view('produits.show');
    }

    public function addCharge(Request $request, Fournisseur $fournisseur) {

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
       
        $fournisseur->produits()->save($produit);

        return back();

    }

    public function addRecette(Request $request, Client $client) {

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

        $client->produits()->save($produit);

        return back();

    }
}
