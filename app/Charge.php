<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Charge extends Model
{
    protected $fillable = ['date', 'prix', 'qtte', 'produit_id', 'fournisseur_id', 'user_id'];

    public function user() {
        
        return $this->belogesTo(User::class);

    }
}
