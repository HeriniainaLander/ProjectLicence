<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['nom', 'classe', 'addresse', 'phone'];

    public function commande() {
        return $this->hasMany(Commande::class);
    }

    public function diffusion() {
        return$this->belongsTo(Diffusion::class);
    }
}
