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

            $fournisseurs = DB::select(DB::raw("SELECT distinct f.id, f.nom from charges c inner JOIN fournisseurs f on c.fournisseur_id = f.id where c.user_id = ".Auth::user()->id));

            $clients = DB::select(DB::raw("SELECT distinct c.id, c.nom from recettes r inner JOIN clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id));

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

            $topClients = DB::table('recettes AS R')
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

            return view('home', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes', 'recettes', 'charges', 'produitsCharge', 'produitsRecette', 'produits', 'topClients', 'clients', 'fournisseurs'));
        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('home_new');
        } else {
            return redirect('/login');
        }
    }

    public function weekly()
    {
        if (Auth::check() && Auth::user()->role <= 3) {

            $fournisseurs = DB::select(DB::raw("SELECT distinct f.id, f.nom from charges c inner JOIN fournisseurs f on c.fournisseur_id = f.id where c.user_id = ".Auth::user()->id));

            $clients = DB::select(DB::raw("SELECT distinct c.id, c.nom from recettes r inner JOIN clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id));

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

            $topClients = DB::table('recettes AS R')
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

            return view('home_weekly', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes', 'recettes', 'charges', 'produitsCharge', 'produitsRecette', 'produits', 'topClients', 'clients', 'fournisseurs'));
        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('home_new');
        } else {
            return redirect('/login');
        }
    }

    public function monthly()
    {
        if (Auth::check() && Auth::user()->role <= 3) {

            $fournisseurs = DB::select(DB::raw("SELECT distinct f.id, f.nom from charges c inner JOIN fournisseurs f on c.fournisseur_id = f.id where c.user_id = ".Auth::user()->id));

            $clients = DB::select(DB::raw("SELECT distinct c.id, c.nom from recettes r inner JOIN clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id));

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

            $topClients = DB::table('recettes AS R')
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

            return view('home_monthly', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes', 'recettes', 'charges', 'produitsCharge', 'produitsRecette', 'produits', 'topClients', 'clients', 'fournisseurs'));
        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('home_new');
        } else {
            return redirect('/login');
        }
    }

    public function quarterly()
    {
        if (Auth::check() && Auth::user()->role <= 3) {

            $fournisseurs = DB::select(DB::raw("SELECT distinct f.id, f.nom from charges c inner JOIN fournisseurs f on c.fournisseur_id = f.id where c.user_id = ".Auth::user()->id));

            $clients = DB::select(DB::raw("SELECT distinct c.id, c.nom from recettes r inner JOIN clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id));

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

            $topClients = DB::table('recettes AS R')
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

            return view('home_quarterly', compact('resultatsCharges', 'resultatsRecettes', 'resultats', 'jsonCharges', 'jsonRecettes', 'recettes', 'charges', 'produitsCharge', 'produitsRecette', 'produits', 'topClients', 'clients', 'fournisseurs'));
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
                            ->groupBy('p.type')
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

    public function chiffreCharge(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as 'prix' from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else if ($request->dateF == '') {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as 'prix' from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else if ($request->dateD == '') {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as 'prix' from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as 'prix' from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, (c.prix * c.qtte) as prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            }

        }

    }

    public function chiffreRecette(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as 'prix' from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id." and p.nom like '$request->produit%' and c.nom like '$request->client%' order by r.date"));
                
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else if ($request->dateF == '') {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as 'prix' from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id." and r.date >= $request->dateD and p.nom like '$request->produit%' and c.nom like '$request->client%' order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else if ($request->dateD == '') {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as 'prix' from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id." and r.date <= $request->dateF and p.nom like '$request->produit%' and c.nom like '$request->client%' order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as 'prix' from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id." and r.date >= $request->dateD and r.date <= $request->dateF and p.nom like '$request->produit%' and c.nom like '$request->client%' order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, (r.prix * r.qtte) as prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            }

        }

    }

    public function quantiteCharge(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, c.qtte from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else if ($request->dateF == '') {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, count(*) as qtte from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' group by p.id, p.nom, f.nom, c.date order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.qtte'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else if ($request->dateD == '') {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, count(*) as qtte from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' group by p.id, p.nom, f.nom, c.date order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.qtte'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            } else {
                // $jsonCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, count(*) as qtte from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' group by p.id, p.nom, f.nom, c.date order by c.date"));
                $jsonCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.qtte'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonCharges'=>$jsonCharges), 200);
            }

        }

    }

    public function quantiteRecette(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, r.qtte as qtte from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where c.user_id = ".Auth::user()->id." and p.nom like '%$request->produit' and c.nom like '$request->client%' order by r.date"));
                
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else if ($request->dateF == '') {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, count(*) as qtte from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where c.user_id = ".Auth::user()->id." and r.date >= $request->dateD and p.nom like '%$request->produit' and c.nom like '$request->client%' group by p.id, p.nom, c.nom, r.date order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.qtte'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else if ($request->dateD == '') {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, count(*) as qtte from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where c.user_id = ".Auth::user()->id." and r.date <= $request->dateF and p.nom like '%$request->produit' and c.nom like '$request->client%' group by p.id, p.nom, c.nom, r.date order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.qtte'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            } else {
                // $jsonRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, count(*) as qtte from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where c.user_id = ".Auth::user()->id." and r.date >= $request->dateD and r.date <= $request->dateF and p.nom like '%$request->produit' and c.nom like '$request->client%' group by p.id, p.nom, c.nom, r.date order by r.date"));
                $jsonRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.qtte'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonRecettes'=>$jsonRecettes), 200);
            }

        }

    }

    public function prixCharge(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonPrixCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, c.prix from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                return response()->json(array('jsonPrixCharges'=>$jsonPrixCharges), 200);
            } else if ($request->dateF == '') {
                // $jsonPrixCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, c.prix from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonPrixCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonPrixCharges'=>$jsonPrixCharges), 200);
            } else if ($request->dateD == '') {
                // $jsonPrixCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, c.prix from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonPrixCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonPrixCharges'=>$jsonPrixCharges), 200);
            } else {
                // $jsonPrixCharges = DB::select(DB::raw("SELECT p.id, p.nom, f.nom, c.date, c.prix from produits p inner join charges c on p.id = c.produit_id inner join fournisseurs f on f.id = c.fournisseur_id where c.user_id = ".Auth::user()->id." and c.date >= $request->dateD and c.date <= $request->dateF and p.nom like '$request->produit%' and f.nom like '$request->fournisseur%' order by c.date"));
                $jsonPrixCharges = DB::table('charges as c')
                               ->select(DB::raw('p.id, p.nom, f.nom, c.date, c.prix'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->join('fournisseurs as f', 'c.fournisseur_id', '=', 'f.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('c.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('f.nom', 'like', $request->fournisseur.'%')
                               ->orderBy('c.date')
                               ->get();
                return response()->json(array('jsonPrixCharges'=>$jsonPrixCharges), 200);
            }

        }

    }

    public function prixRecette(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $jsonPrixRecettes = DB::select(DB::raw("SELECT p.id, p.nom, c.nom, r.date, r.prix from produits p inner join recettes r on p.id = r.produit_id inner join clients c on c.id = r.client_id where r.user_id = ".Auth::user()->id." and p.nom like '$request->produit%' and c.nom like '$request->client%' order by r.date"));
                
                return response()->json(array('jsonPrixRecettes'=>$jsonPrixRecettes), 200);
            } else if ($request->dateF == '') {
                $jsonPrixRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonPrixRecettes'=>$jsonPrixRecettes), 200);
            } else if ($request->dateD == '') {
                $jsonPrixRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonPrixRecettes'=>$jsonPrixRecettes), 200);
            } else {
                $jsonPrixRecettes = DB::table('recettes as r')
                               ->select(DB::raw('p.id, p.nom, c.nom, r.date, r.prix'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->join('clients as c', 'r.client_id', '=', 'c.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('r.date', '<=', $request->dateF)
                               ->where('p.nom', 'like', $request->produit.'%')
                               ->where('c.nom', 'like', $request->client.'%')
                               ->orderBy('r.date')
                               ->get();
                return response()->json(array('jsonPrixRecettes'=>$jsonPrixRecettes), 200);
            }

        }

    }

    public function filterCharge(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {
        
            $jsonProduits = DB::select(DB::raw("SELECT p.nom as produit from fournisseurs f inner join produits p on f.id = p.fournisseur_id where f.user_id = ".Auth::user()->id." and f.id = $request->fournisseur"));

            return response()->json(array('jsonProduits'=>$jsonProduits), 200);

        }

    }

    public function filterRecette(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {
        
            $jsonProduits = DB::select(DB::raw("SELECT p.nom as produit from charges c inner join produits p on c.id = p.client_id where c.user_id = ".Auth::user()->id." and c.id = $request->client"));

            return response()->json(array('jsonProduits'=>$jsonProduits), 200);

        }

    }

    public function cpc()
    {
        if (Auth::check() && Auth::user()->role <= 3) {

            return view('cpc');

        } else if (Auth::check() && Auth::user()->role == 4) {
            return view('home_new');
        } else {
            return redirect('/login');
        }
    }

    public function cpc_filter(Request $request) {

        if (Auth::check() && Auth::user()->role <= 3) {

            if ($request->dateD == '' && $request->dateF == '') {
                $charges = DB::select(DB::raw("SELECT p.type, SUM(c.prix * c.qtte) AS montant FROM charges c INNER JOIN produits p ON p.id = c.produit_id where c.user_id = ".Auth::user()->id." GROUP BY p.type"));

                $recettes = DB::select(DB::raw("SELECT p.type, SUM(r.prix * r.qtte) AS montant FROM recettes r INNER JOIN produits p ON p.id = r.produit_id where r.user_id = ".Auth::user()->id." GROUP BY p.type"));
                
                return response()->json(array('charges'=>$charges, 'recettes'=>$recettes), 200);
            } else if ($request->dateF == '') {
                $charges = DB::table('charges as c')
                               ->select(DB::raw('SELECT p.type, SUM(c.prix * c.qtte) AS montant'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->groupBy('p.type')
                               ->get();

                $recettes = DB::table('recettes as r')
                               ->select(DB::raw('SELECT p.type, SUM(r.prix * r.qtte) AS montant'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->where('r.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->groupBy('p.type')
                               ->get();
                return response()->json(array('charges'=>$charges, 'recettes'=>$recettes), 200);
            } else if ($request->dateD == '') {
                $charges = DB::table('charges as c')
                               ->select(DB::raw('SELECT p.type, SUM(c.prix * c.qtte) AS montant'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '<=', $request->dateF)
                               ->groupBy('p.type')
                               ->get();
                               
                $recettes = DB::table('recettes as r')
                               ->select(DB::raw('SELECT p.type, SUM(r.prix * r.qtte) AS montant'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->where('r.user_id', '=', Auth::user()->id)
                               ->where('r.date', '<=', $request->dateF)
                               ->groupBy('p.type')
                               ->get();
                return response()->json(array('charges'=>$charges, 'recettes'=>$recettes), 200);
            } else {
                $cpc = DB::table('charges as c')
                               ->select(DB::raw('SELECT p.type, SUM(c.prix * c.qtte) AS montant'))
                               ->join('produits as p', 'c.produit_id', '=', 'p.id')
                               ->where('c.user_id', '=', Auth::user()->id)
                               ->where('c.date', '>=', $request->dateD)
                               ->where('c.date', '<=', $request->dateF)
                               ->groupBy('p.type')
                               ->get();

                $recettes = DB::table('recettes as r')
                               ->select(DB::raw('SELECT p.type, SUM(r.prix * r.qtte) AS montant'))
                               ->join('produits as p', 'r.produit_id', '=', 'p.id')
                               ->where('r.user_id', '=', Auth::user()->id)
                               ->where('r.date', '>=', $request->dateD)
                               ->where('r.date', '<=', $request->dateF)
                               ->groupBy('p.type')
                               ->get();
                return response()->json(array('charges'=>$charges, 'recettes'=>$recettes), 200);
            }

        }

    }
}
