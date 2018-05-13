<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

class FournisseurController extends Controller
{
    public function add(Request $request) {

        $this->validate(
            $request,
            ['nom' => 'required|min:5'],
            ['nom.required' => 'Le nom est obligatoire!'],
            ['telephone' => 'required|numeric|regex:/(0)([5-7])[0-9]{8}/'],
            ['telephone.required' => 'Telephone est obligatoire!']
        );

        $fournisseur = new Fournisseur;
        $fournisseur->nom = $request->nom;
        $fournisseur->telephone = $request->telephone;
        $fournisseur->activite = $request->activite;
        $fournisseur->region = $request->region;
        $fournisseur->save();

        return back();
    }
}
