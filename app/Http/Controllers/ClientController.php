<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Client;

class ClientController extends Controller
{
    public function add(Request $request) {

        $this->validate(
            $request,
            ['nom_client' => 'required|min:5'],
            ['nom_client.required' => 'Le nom est obligatoire!'],
            ['telephone' => 'required|numeric|regex:/(0)([5-7])[0-9]{8}/'],
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
    }

    public function delete(Client $client) {

        $client->delete();

        return back();

    }

    public function edit(Client $client) {

        return view('clients.editPage', compact('client'));

    }

    public function update(Request $request, Client $client) {

        $this->validate(
            $request,
            ['nom' => 'required|min:5'],
            ['nom.required' => 'Le nom est obligatoire!'],
            ['telephone' => 'required|numeric|regex:/(0)([5-7])[0-9]{8}/'],
            ['telephone.required' => 'Telephone est obligatoire!']
        );

        $client->update($request->all());

        return redirect('programmer');

    }
}
