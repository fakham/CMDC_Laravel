<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Client;
use App\Fournisseur;
use App\Produit;
use App\Charge;
use App\Recette;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom', 'nom', 'username', 'email', 'telephone', 'password', 'role', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clients() {

        return $this->hasMany(Client::class);

    }

    public function fournisseurs() {

        return $this->hasMany(Fournisseur::class);

    }

    public function produits() {

        return $this->hasMany(Produit::class);

    }

    public function charges() {

        return $this->hasMany(Charge::class);

    }

    public function recettes() {

        return $this->hasMany(Recette::class);

    }
}
