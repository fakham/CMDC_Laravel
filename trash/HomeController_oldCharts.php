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
        if (Auth::check() && Auth::user()->role <= 3) {

            // $recettes = DB::table('recettes AS R')
            // ->select("R.id AS id", "R.date AS date", "R.prix AS prix", "R.qtte AS qtte", "P.nom AS produit", "P.type AS typeP")
            // ->join('produits AS P', 'R.produit_id', '=', 'P.id')
            // ->where('R.user_id', '=', Auth::user()->id)->orderBy('date')
            // ->get();

            $recettes = DB::table('recettes AS R')
            ->select("R.id AS id", "R.date AS date", "R.prix AS prix", "R.qtte AS qtte", "C.id AS id_client", "C.nom AS client", "P.nom AS produit", "P.type AS typeP")
            ->join('clients AS C', 'R.client_id', '=', 'C.id')
            ->join('produits AS P', 'R.produit_id', '=', 'P.id')
            ->where('R.user_id', '=', Auth::user()->id)->orderBy('date')
            ->get();

            $charges = DB::table('charges AS C')
            ->select("C.id AS id", "C.date AS date", "C.prix AS prix", "C.qtte AS qtte", "F.id AS id_fournisseur", "F.nom AS fournisseur", "P.nom AS produit", "P.type AS typeP")
            ->join('fournisseurs AS F', 'C.fournisseur_id', '=', 'F.id')
            ->join('produits AS P', 'C.produit_id', '=', 'P.id')
            ->where('C.user_id', '=', Auth::user()->id)->orderBy('date')
            ->get();

            $produits = DB::table('recettes AS R')
            ->select(DB::raw("P.nom, count(*) as 'nbr'"))
            ->join('produits as P', 'R.produit_id', '=', 'P.id')
            ->where('R.user_id', '=', Auth::user()->id)
            ->groupBy('P.nom')
            ->orderBy('nbr', 'desc')
            ->limit(5)
            ->get();

            $clients = DB::table('recettes AS R')
            ->select(DB::raw("C.nom, count(*) as 'nbr'"))
            ->join('clients as C', 'R.client_id', '=', 'C.id')
            ->where('R.user_id', '=', Auth::user()->id)
            ->groupBy('C.nom')
            ->orderBy('nbr', 'desc')
            ->limit(10)
            ->get();
            
            $produitsCharge = DB::table('produits')
            ->where('user_id','=', Auth::user()->id)
            ->whereNotNull('fournisseur_id')
            ->get();

            $produitsRecette = DB::table('produits')
            ->where('user_id','=', Auth::user()->id)
            ->whereNotNull('client_id')
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

            return view('home', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes', 'recettes', 'charges', 'produitsCharge', 'produitsRecette', 'produits', 'clients'));
        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('home_new');
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

    public function structureCharge(Request  $request) {

        if (Auth::check() && Auth::user()->role <= 3) {
            
            if ($request->dateD == ''  && $request->dateF == '') {
                $structure = DB::table('charges as c')
                            ->select(DB::raw('p.type, count(*) as nombre'))
                            ->join('produits as p', 'c.produit_id', '=', 'p.id')
                            ->where('p.user_id', '=', Auth::user()->id)
                            ->groupBy('P.type')
                            ->get();

                // return $structure->toJson();
                return response()->json(array('structure'=> $structure), 200);

            } else if ($request->dateF == '') {
                $structure = DB::table('charges as c')
                            ->select(DB::raw('p.type, count(*) as nombre'))
                            ->join('produits as p', 'c.produit_id', '=', 'p.id')
                            ->where('p.user_id', '=', Auth::user()->id)
                            ->where('c.date', '>=', $request->dateD)
                            ->where('c.date', '<=', 'getdate()')
                            ->groupBy('p.type')
                            ->get();

                return response()->json(array('structure'=> $structure), 200);

            } else if ($request->dateD == '') {
                $structure = DB::table('charges as c')
                            ->select(DB::raw('p.type, count(*) as nombre'))
                            ->join('produits as p', 'c.produit_id', '=', 'p.id')
                            ->where('p.user_id', '=', Auth::user()->id)
                            ->where('c.date', '<=', $request->dateF)
                            ->groupBy('p.type')
                            ->get();

                // return $structure->toJson();
                return response()->json(array('structure'=> $structure), 200);

            } else {
                $structure = DB::table('charges as c')
                            ->select(DB::raw('p.type, count(*) as nombre'))
                            ->join('produits as p', 'c.produit_id', '=', 'p.id')
                            ->where('p.user_id', '=', Auth::user()->id)
                            ->where('c.date', '>=', $request->dateD)
                            ->where('c.date', '<=', $request->dateF)
                            ->groupBy('p.type')
                            ->get();

                // return $structure->toJson();
                return response()->json(array('structure'=> $structure), 200);
            }
        
        }

    }
}
