<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Client;
use App\Fournisseur;

class Produit extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'type', 'qtte', 'isFinit', 'client', 'fournisseur'];

    public function client() {

        return $this->belogesTo(Client::class);

    }

    public function fournisseur() {
        
        return $this->belogesTo(Fournisseur::class);

    }
}
