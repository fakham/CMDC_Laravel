<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Fournisseur;

class Charge extends Model
{
    protected $fillable = ['date', 'prix', 'qtte', 'produit_id', 'fournisseur_id', 'user_id'];

    public function user() {
        
        return $this->belogesTo(User::class);

    }

    public function fournisseur() {
        
        return $this->belogesTo(Fournisseur::class);

    }
}
