<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Diffusion;
use Illuminate\Http\Request;

class DiffusionController extends Controller
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
        $diffusions = Diffusion::all();
        return view('pages.diffusion.index',compact('diffusions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('pages.diffusion.create',compact('clients'));
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
            'title' => 'required|min:3',
            'debutDiff' => 'required',
            'finDiff' => 'required',
            'heureDiff' => 'required|string',
            'nbDiff' => 'required|numeric',
            'quitance' => 'required',
            'client' => 'required'
        ]);

        $title = ucwords($request->title);

        Diffusion::create([
            'titre' => $title,
            'debut_diffusion' => $request->debutDiff,
            'fin_diffusion' => $request->finDiff,
            'heure_diffusion' => $request->heureDiff,
            'nb_diffusion' => $request->nbDiff,
            'numQuitance' => $request->quitance,
            'client_id' => $request->client
        ]);
        flashy()->success('Une diffusion à été créée correctement.');
        return redirect()->route('diffusions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $diffusion = Diffusion::findOrFail($id);

        return view('pages.diffusion.show', compact('diffusion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {   $clients = Client::all();
        $diffusion = Diffusion::findOrFail($id);
        return view('pages.diffusion.edit', compact('diffusion','clients'));
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
            'title' => 'required|min:3',
            'debutDiff' => 'required',
            'finDiff' => 'required',
            'heureDiff' => 'required|string',
            'nbDiff' => 'required|numeric',
            'quitance' => 'required|numeric|max:9999999',
            'client' => 'required'
        ]);
        $diffusion = Diffusion::findOrFail($id);

        $title = ucwords($request->title);

        $diffusion->update([
            'titre' => $title,
            'debut_diffusion' => $request->debutDiff,
            'fin_diffusion' => $request->finDiff,
            'heure_diffusion' => $request->heureDiff,
            'nb_diffusion' => $request->nbDiff,
            'numQuitance' => $request->quitance,
            'client_id' => $request->client
        ]);
        flashy()->success('Une diffusion à été mise à jour correctement.');
        return redirect()->route('diffusions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $diffusion = Diffusion::findOrFail($id);
        $diffusion->delete();
        flashy()->success('Un diffusion à été supprimer correctement.');
        return redirect()->route('diffusions.index');
    }
}
