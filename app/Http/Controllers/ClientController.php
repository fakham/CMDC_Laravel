<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Client;

class ClientController extends Controller
{
    public function add(Request $request) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom_client' => 'required'],
                ['nom_client.required' => 'Le nom est obligatoire!'],
                ['telephone' => 'required|numeric'],
                ['telephone.required' => 'Telephone est obligatoire!']
            );

            $client = new Client;
            $client->nom = $request->nom_client;
            $client->telephone = $request->telephone;
            $client->activite = $request->activite;
            $client->region = $request->region;

            $user = Auth::user();

            $user->clients()->save($client);

            return back();

        } else {
            return redirect('/login');
        }
    }

    public function delete(Client $client) {

        if (Auth::check()) {

            $client->delete();

            return back();

        } else {
            return redirect('/login');
        }

    }

    public function edit(Client $client) {

        if (Auth::check()) {

            return view('clients.editPage' , compact('client'));

        } else {
            return redirect('/login');
        }

    }

    public function update(Request $request, Client $client) {

        if (Auth::check()) {

            $this->validate(
                $request,
                ['nom' => 'required'],
                ['nom.required' => 'Le nom est obligatoire!'],
                ['telephone' => 'required|numeric'],
                ['telephone.required' => 'Telephone est obligatoire!']
            );

            $client->update($request->all());

            return redirect('/programmer');

        } else {
            return redirect('/login');
        }

    }
}
