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
            ->where('R.user_id', '=', Auth::user()->id)->orderBy('date')
            ->get();

            $charges = DB::table('charges AS C')
            ->select("C.id AS id", "C.date AS date", "C.prix AS prix", "C.qtte AS qtte", "P.nom AS produit", "P.type AS typeP")
            ->join('produits AS P', 'C.produit_id', '=', 'P.id')
            ->where('C.user_id', '=', Auth::user()->id)->orderBy('date')
            ->get();
            
            $resultatsCharges = 0;
            $resultatsRecettes = 0;

            foreach ($charges as $charge)
                $resultatsCharges += $charge->prix * $charge->qtte;

            foreach ($recettes as $recette)
                $resultatsRecettes += $recette->prix * $recette->qtte;

            $resultats = $resultatsRecettes - $resultatsCharges;

            $jsonCharges = $charges->toJson();
            $jsonRecettes = $recettes->toJson();

            return view('home', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes'));
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
