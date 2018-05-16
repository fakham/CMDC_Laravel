<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Charge;

class ChargeController extends Controller
{
    public function add() {

        $produits = DB::table('produits')->where('user_id','=', Auth::user()->id)->get();
        $fournisseurs = DB::table('fournisseurs')->where('user_id','=', Auth::user()->id)->get();

        return view('charges/addCharge', compact('produits', 'fournisseurs'));
    }

    public function show() {

        // $charges = DB::table('charges')->where('user_id', '=', Auth::user()->id)->get();

        $charges = DB::table('charges AS C')
        ->select("C.id AS id", "C.date AS date", "C.prix AS prix", "C.qtte AS qtte", "F.nom AS fournisseur", "P.nom AS produit")
        ->join('fournisseurs AS F', 'C.fournisseur_id', '=', 'F.id')
        ->join('produits AS P', 'C.produit_id', '=', 'P.id')
        ->where('C.user_id', '=', Auth::user()->id)
        ->get();

        // dump($charges->all());
        // die;

        return view('charges/show', compact('charges'));
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

        $charge = new Charge;
        $charge->date = $request->date;
        $charge->prix = $request->prix;
        $charge->qtte = $request->qtte;
        $charge->produit_id = $request->produit;
        $charge->fournisseur_id = $request->fournisseur;

        $user = Auth::user();

        $user->charges()->save($charge);

        return redirect('/charges');
    }

    public function delete(Charge $charge) {

        $charge->delete();

        return back();

    }
}
