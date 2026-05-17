<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Categorie;

class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $contrats = Contrat::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->latest()->get();

    return view(

        'contrats.index',

        compact('contrats')

    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $employes = Employe::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->get();

    $postes = Poste::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    $categories = Categorie::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    return view(

        'contrats.create',

        compact(
            'employes',
            'postes',
            'categories'
        )

    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'employe_id' => 'required',

        'type_contrat' => 'required',

        'salaire_base' => 'required|numeric',

        'date_debut' => 'required',

    ]);

    Contrat::create([

        'entreprise_id'
            => auth()->user()->entreprise_id,

        'employe_id' => $request->employe_id,

        'poste_id' => $request->poste_id,

        'categorie_id' => $request->categorie_id,

        'type_contrat' => $request->type_contrat,

        'salaire_base' => $request->salaire_base,

        'date_debut' => $request->date_debut,

        'date_fin' => $request->date_fin,

        'statut' => 'actif',

    ]);

    return redirect()
            ->route('contrats.index')
            ->with(
                'success',
                'Contrat créé'
            );
}

    /**
     * Display the specified resource.
     */
    public function show(Contrat $contrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrat $contrat)
{
    if(
        $contrat->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $employes = Employe::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->get();

    $postes = Poste::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    $categories = Categorie::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    return view(

        'contrats.edit',

        compact(
            'contrat',
            'employes',
            'postes',
            'categories'
        )

    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Contrat $contrat
)
{
    if(
        $contrat->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $request->validate([

        'employe_id' => 'required',

        'type_contrat' => 'required',

        'salaire_base' => 'required|numeric',

        'date_debut' => 'required',

    ]);

    $contrat->update([

        'employe_id' => $request->employe_id,

        'poste_id' => $request->poste_id,

        'categorie_id' => $request->categorie_id,

        'type_contrat' => $request->type_contrat,

        'salaire_base' => $request->salaire_base,

        'date_debut' => $request->date_debut,

        'date_fin' => $request->date_fin,

        'statut' => $request->statut,

    ]);

    return redirect()
            ->route('contrats.index')
            ->with(
                'success',
                'Contrat modifié'
            );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrat $contrat)
{
    if(
        $contrat->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $contrat->delete();

    return redirect()
            ->route('contrats.index')
            ->with(
                'success',
                'Contrat supprimé'
            );
}
}
