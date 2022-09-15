<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['client_id','offre_id','date_commande','diffusion_id','nom_emetteur','nom_recepteur','net_a_payer'];

    public function client() {
        return $this->belongsTo(Client::class);
    }
    public function offre() {
        return $this->belongsTo(Offre::class);
    }
    public function diffusion() {
        return$this->belongsTo(Diffusion::class);
    }
}
