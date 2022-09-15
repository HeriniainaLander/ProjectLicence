<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diffusion extends Model
{
    protected $table = 'diffusions';
    protected $fillable = ['titre','client_id','debut_diffusion','fin_diffusion','heure_diffusion','nb_diffusion','numQuitance'];
    public function commande() {
        return $this->hasMany(Commande::class);
    }
    public function client() {
        return$this->belongsTo(Client::class);
    }
}
