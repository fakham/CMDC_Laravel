<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $recettes = DB::table('recettes AS R')
            ->select("R.id AS id", "R.date AS date", "R.prix AS prix", "R.qtte AS qtte", "P.nom AS produit", "P.type AS typeP")
            ->join('produits AS P', 'R.produit_id', '=', 'P.id')
            ->where('R.user_id', '=', Auth::user()->id)
            ->get();

            $charges = DB::table('charges AS C')
            ->select("C.id AS id", "C.date AS date", "C.prix AS prix", "C.qtte AS qtte", "P.nom AS produit", "P.type AS typeP")
            ->join('produits AS P', 'C.produit_id', '=', 'P.id')
            ->where('C.user_id', '=', Auth::user()->id)
            ->get();

            $chargesExp = 0;
            $chargesFin = 0;
            $chargesNon = 0;

            $recettesExp = 0;
            $recettesFin = 0;
            $recettesNon = 0;

            foreach($charges as $charge) {
                if ($charge->typeP == "Explotation")
                    $chargesExp += $charge->prix * $charge->qtte;
                else if ($charge->typeP == "Financière")
                    $chargesFin += $charge->prix * $charge->qtte;
                else if ($charge->typeP == "Non courante")
                    $chargesNon += $charge->prix * $charge->qtte;
            }

            foreach($recettes as $recette) {
                if ($recette->typeP == "Explotation")
                    $recettesExp += $recette->prix * $recette->qtte;
                else if ($recette->typeP == "Financière")
                    $recettesFin += $recette->prix * $recette->qtte;
                else if ($recette->typeP == "Non courante")
                    $recettesNon += $recette->prix * $recette->qtte;
            }

            $resultatsExp = $recettesExp - $chargesExp;
            $resultatsFin = $recettesFin - $chargesFin;
            $resultatsNon = $recettesNon - $chargesNon;

            $resultats = $resultatsExp + $resultatsFin + $resultatsNon;

            return view('home', compact('resultatsExp', 'resultatsFin', 'resultatsNon', 'resultats'));
        } else {
            return redirect('/login');
        }
    }

    public function control()
    {
        if (Auth::user()->role >= 3)
            return redirect('/');
        
        $users = DB::table('users')->get();

        return view('admin.control', compact('users'));
        
    }

    public function updateRole(Request $request, User $user) {

        if (Auth::user()->role >= 3)
            return redirect('/');

        $user->update($request->all());

        $user->admin = Auth::user()->id;

        $user->save();

        return redirect('/control');

    }
}
