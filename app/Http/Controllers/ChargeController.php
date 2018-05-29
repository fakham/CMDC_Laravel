<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Charge;

class ChargeController extends Controller
{
    public function add() {

        if (Auth::check()) {

            $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->whereNotNull('fournisseur_id')->get();
            $fournisseurs = DB::table('fournisseurs')->where('user_id','=', Auth::user()->id)->get();
    
            return view('charges.addCharge', compact('produits', 'fournisseurs'));

        } else {
            return redirec('/login');
        }
    }

    public function show() {

        if (Auth::check()) {

            $charges = DB::table('charges AS C')
            ->select("C.id AS id", "C.date AS date", "C.prix AS prix", "C.qtte AS qtte", "F.nom AS fournisseur", "P.nom AS produit")
            ->join('fournisseurs AS F', 'C.fournisseur_id', '=', 'F.id')
            ->join('produits AS P', 'C.produit_id', '=', 'P.id')
            ->where('C.user_id', '=', Auth::user()->id)
            ->get();

            return view('charges.show', compact('charges'));

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

            $charge = new Charge;
            $charge->date = $request->date;
            $charge->prix = $request->prix;
            $charge->qtte = $request->qtte;
            $charge->produit_id = $request->produit;
            $charge->fournisseur_id = $request->fournisseur;

            $user = Auth::user();

            $user->charges()->save($charge);

            return redirect('/charges?added=true');

        } else {
            return redirect('/login');
        }
    }

    public function delete(Charge $charge) {

        if (Auth::check()) {

            $charge->delete();

            // return back();
            return redirect('/charges?deleted=true');

        } else {
            return redirect('/login');
        }

    }

    public function edit(Charge $charge) {

        if (Auth::check()) {

            $fournisseurs = DB::table('fournisseurs')->where('user_id', '=', Auth::user()->id)->get();
            $produits = DB::table('produits')->where('user_id', '=', Auth::user()->id)->get();
            
            return view('charges.edit', compact('charge', 'fournisseurs', 'produits'));

        } else {
            return redirect('/login');
        }
    }

    public function update(Request $request, Charge $charge) {

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

            $charge->update($request->all());

            return redirect('/charges?modified=true');

        } else {
            return redirect('/login');
        }

    }
}
