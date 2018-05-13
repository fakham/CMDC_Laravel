<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function add(Request $request) {

        $this->validate(
            $request,
            ['nom' => 'required|min:5'],
            ['text.required' => 'Le nom est obligatoire!'],
            ['telephone' => 'required|numeric|regex:/(0)([5-7])[0-9]{8}/'],
            ['telephone.required' => 'Telephone est obligatoire!']
        );

        $client = new Client;
        $client->nom = $request->nom;
        $client->telephone = $request->telephone;
        $client->activite = $request->activite;
        $client->region = $request->region;
        $client->save();

        return back();
    }
}
