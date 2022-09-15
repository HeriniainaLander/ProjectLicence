<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Diffusion;
use App\Models\Offre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all()->count();
        $offres = Offre::all()->count();
        $diffusions = Diffusion::all()->count();
        $commandes = Commande::all()->count();
        return view('pages.home',compact('clients','offres','diffusions','commandes'));
    }
}
