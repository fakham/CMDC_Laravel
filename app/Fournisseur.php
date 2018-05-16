<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produit;
use App\User;
use App\Charge;

class Fournisseur extends Model
{
    protected $fillable = ['nom', 'telephone', 'activite', 'region'];

    public function produits() {

        return $this->hasMany(Produit::class);

    }

    public function user() {
        
        return $this->belogesTo(User::class);

    }

    public function charges() {
        
        return $this->belogesToMany(Charge::class);

    }
}
