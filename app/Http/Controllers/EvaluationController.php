<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use Illuminate\Support\Carbon;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = [];
        $clients = Client::all();
        return view('pages.evaluation.pardate', compact('commandes','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {
        $this->validate($request, [
            'debut' => 'required',
            'fin' => 'required'
        ]);

        $clients = Client::all();
        $debut = $request->input('debut');
        $fin = $request->input('fin');
        $date_debut = Carbon::parse($debut)->format('Y-m-d');
        $date_fin = Carbon::parse($fin)->format('Y-m-d');
        $commandes = Commande::with('client')->with('offre')->with('diffusion')
        ->where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->get();
        $Montant = floatval(Commande::where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->sum('net_a_payer')) ? floatval(Commande::where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->sum('net_a_payer')) : 0;

        $Total_commande = intval(Commande::where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->count()) ? intval(Commande::where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->count()) : 0;
        return view('pages.evaluation.pardate', compact(['commandes','clients','Montant','Total_commande']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'debut' => 'required',
            'fin' => 'required'
        ]);
        $clients = Client::all();
        $nom = $request->input('nom');
        $debut = $request->input('debut');
        $fin = $request->input('fin');
        $date_debut = Carbon::parse($debut)->format('Y-m-d');
        $date_fin = Carbon::parse($fin)->format('Y-m-d');
        $client = Client::where('nom', '=', $nom)->get();
        $commandes = Commande::with('client')->with('offre')->with('diffusion')
        ->where('client_id', '=', $client->id)
        ->where('date_commande', '>=', $date_debut)
        ->where('date_commande', '<=', $date_fin)
        ->get();
        return view('pages.evaluation.name', compact('commandes','clients'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $commandes = [];
        $clients = Client::all();
        return view('pages.evaluation.name', compact('commandes','clients'));
    }

}
