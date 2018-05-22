<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Fournisseur;

class FournisseurController extends Controller
{
    public function add(Request $request) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom_fournisseur' => 'required'],
                ['nom_fournisseur.required' => 'Le nom est obligatoire!'],
                ['telephone' => 'required|numeric'],
                ['telephone.required' => 'Telephone est obligatoire!']
            );

            $fournisseur = new Fournisseur;
            $fournisseur->nom = $request->nom_fournisseur;
            $fournisseur->telephone = $request->telephone;
            $fournisseur->activite = $request->activite;
            $fournisseur->region = $request->region;

            $user = Auth::user();

            $user->fournisseurs()->save($fournisseur);

            return back();

        } else {
            return redirect('/login');
        }
    }

    public function delete(Fournisseur $fournisseur) {

        if (Auth::check()) {

            $fournisseur->delete();

            return back();

        } else {
            return redirect('/login');
        }

    }

    public function edit(Fournisseur $fournisseur) {

        if (Auth::check()) {

            return view('fournisseurs.editPage', compact('fournisseur'));

        } else {
            return redirect('/login');
        }

    }

    public function update(Request $request, Fournisseur $fournisseur) {
        
        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom' => 'required'],
                ['nom.required' => 'Le nom est obligatoire!'],
                ['telephone' => 'required|numeric'],
                ['telephone.required' => 'Telephone est obligatoire!']
            );

            $fournisseur->update($request->all());

            return redirect('/programmer');

        } else {
            return redirect('/login');
        }

    }
}
