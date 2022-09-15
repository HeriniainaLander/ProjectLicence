<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Diffusion;
use App\Models\Offre;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommandeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::with('client')->with('offre')->with('diffusion')->get()->sortBy('id');
        return view('pages.commande.index',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $offres = Offre::all();
        $diffusions = Diffusion::all();
        return view('pages.commande.create',compact('clients','offres', 'diffusions'));
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
            'client' => 'required',
            'offre' => 'required',
            'diffusion' => 'required',
            'dateCmd' => 'required',
            'emetteur'  => 'required|string|min:2',
            'recepteur' => 'required|string|min:2'
        ]);

        $nomEmetteur = ucwords($request->emetteur);
        $nomRecepteur = ucwords($request->recepteur);
        $offre = Offre::findOrFail($request->offre);
        $diffusion = Diffusion::findOrFail($request->diffusion);
        $client = Client::findOrFail($request->client);
        $net_a_payer = floatval($diffusion->nb_diffusion) * floatval($offre->prix) ;
        if($client->classe == 'Service Publique') {
            $net_a_payer = 0.00;
        }
        Commande::create([
            'client_id' => $request->client,
            'offre_id' => $offre->id,
            'diffusion_id' => $diffusion->id,
            'date_commande' => $request->dateCmd,
            'nom_emetteur'  => $nomEmetteur,
            'nom_recepteur' => $nomRecepteur,
            'net_a_payer' => $net_a_payer
        ]);
        flashy()->success('Une commande à été créee correctement.');
        return redirect()->route('commandes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $commande = Commande::findOrFail($id);
        return view('pages.commande.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit( int $id)
    {
        $clients = Client::all();
        $offres = Offre::all();
        $diffusions = Diffusion::all();
        $commande = Commande::with('client')->with('offre')->with('diffusion')->findOrFail($id);
        return view('pages.commande.edit', compact('clients','offres','diffusions','commande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'client' => 'required',
            'offre' => 'required',
            'diffusion' => 'required',
            'dateCmd' => 'required',
            'emetteur'  => 'required|string|min:2',
            'recepteur' => 'required|string|min:2'
        ]);
        $commande = Commande::findOrFail($id);
        $nomEmetteur = ucwords($request->emetteur);
        $nomRecepteur = ucwords($request->recepteur);
        $offre = Offre::findOrFail($request->offre);
        $diffusion = Diffusion::findOrFail($request->diffusion);
        $client = Client::findOrFail($request->client);
        $net_a_payer = floatval($diffusion->nb_diffusion) * floatval($offre->prix) ;
        if($client->classe == 'Service Publique') {
            $net_a_payer = 0.00;
        }

        $commande->update([
            'client_id' => $request->client,
            'offre_id' => $offre->id,
            'diffusion_id' => $diffusion->id,
            'date_commande' => $request->dateCmd,
            'nom_emetteur'  => $nomEmetteur,
            'nom_recepteur' => $nomRecepteur,
            'net_a_payer' => $net_a_payer
        ]);
        flashy()->success('Une commande à été mise à jour correctement.');
        return redirect()->route('commandes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();
        flashy()->success('Une commande à été supprimer correctement.');
        return redirect()->route('commandes.index');
    }
}
