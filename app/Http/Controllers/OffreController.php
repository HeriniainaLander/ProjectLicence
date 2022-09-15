<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
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
        $offres = Offre::all();
        return view('pages.offre.index',compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.offre.create');
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
            'libelle' => 'required|min:2',
            'duree' => 'required|min:2',
            'prix' => 'required|numeric'
        ]);

        $libelle = ucwords($request->libelle);
        $duree = $request->duree;
        $prix = $request->prix;

        Offre::create([
            'libelle' => $libelle,
            'duree' => $duree,
            'prix' => $prix
        ]);
        flashy()->success('Une offre à été créée correctement.');
        return redirect()->route('offres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $offre = Offre::findOrFail($id);

        return view('pages.offre.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $offre = Offre::findOrFail($id);
        return view('pages.offre.edit', compact('offre'));
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
            'libelle' => 'required|min:3',
            'duree' => 'required|min:3',
            'prix' => 'required|numeric'
        ]);

        $offre = Offre::findOrFail($id);

        $libelle = ucwords($request->libelle);
        $duree = $request->duree;
        $prix = $request->prix;

        $offre->update([
            'libelle' => $libelle,
            'duree' => $duree,
            'prix' => $prix
        ]);
        flashy()->success('Une offre à été mise à jour correctement.');
        return redirect()->route('offres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $offre = Offre::findOrFail($id);
        $offre->delete();
        flashy()->success('Une offre à été supprimer correctement.');
        return redirect()->route('offres.index');
    }
}
