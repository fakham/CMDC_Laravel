<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function add() {
        return view('charges/addCharge');
    }
}
