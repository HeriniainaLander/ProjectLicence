<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $table = 'offres';

    protected $fillable = ['libelle', 'duree', 'prix'];

    public function commande() {
        return $this->hasMany(Commande::class);
    }
}
