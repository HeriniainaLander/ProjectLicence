<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ClientController extends Controller
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
        $clients = Client::all();
        return view('pages.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.client.create');
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
            'name' => 'required|min:2',
            'class' => 'required|min:3',
            'adress' => 'required|min:2',
            'contact' => 'required|numeric|min:320000000|max:349999999',
        ]);

        $name = ucwords($request->name);
        $class = ucwords($request->class);
        $adress = strtoupper($request->adress);
        $contact = $request->contact;

        Client::create([
            'nom' => $name,
            'classe' => $class,
            'addresse' => $adress,
            'phone' => $contact
        ]);
        flashy()->success('Un client à été crée correctement.');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int  $id)
    {
        $client = Client::findOrFail($id);

        return view('pages.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int  $id)
    {
        $client = Client::findOrFail($id);
        return view('pages.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int  $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'class' => 'required|min:3',
            'adress' => 'required|min:5',
            'contact' => 'required|numeric',
        ]);

        $client = Client::findOrFail($id);

        $name = ucwords($request->name);
        $class = ucwords($request->class);
        //ucfirst() => convertir le premier caractère d'un mot en MAJUSCULE
        $adresse = strtoupper($request->adress);

        $client->update([
            'nom' => $name,
            'classe' => $class,
            'addresse' => $adresse,
            'phone' => $request->contact
        ]);
        flashy()->success('Un client à été mise à jour correctement.');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int  $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        flashy()->success('Un client à été supprimer correctement.');
        return redirect()->route('clients.index');
    }
}
