<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produit;

class Fournisseur extends Model
{
    protected $fillable = ['nom', 'telephone', 'activite', 'region'];

    public function produits() {

        return $this->hasMany(Produit::class);

    }
}
