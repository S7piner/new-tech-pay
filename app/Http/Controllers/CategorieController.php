<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categories = Categorie::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->latest()->get();

    return view(

        'categories.index',

        compact('categories')

    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('categories.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nom' => 'required',

        'salaire_min' => 'nullable|numeric',

        'salaire_max' => 'nullable|numeric',

    ]);

    Categorie::create([

        'entreprise_id'
            => auth()->user()->entreprise_id,

        'nom' => $request->nom,

        'description' => $request->description,

        'salaire_min' => $request->salaire_min,

        'salaire_max' => $request->salaire_max,

        'statut' => true,

    ]);

    return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Catégorie créée'
            );
}

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
{
    if(
        $categorie->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    return view(

        'categories.edit',

        compact('categorie')

    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Categorie $categorie
)
{
    if(
        $categorie->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $request->validate([

        'nom' => 'required',

        'salaire_min' => 'nullable|numeric',

        'salaire_max' => 'nullable|numeric',

    ]);

    $categorie->update([

        'nom' => $request->nom,

        'description' => $request->description,

        'salaire_min' => $request->salaire_min,

        'salaire_max' => $request->salaire_max,

        'statut' => $request->statut,

    ]);

    return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Catégorie modifiée'
            );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
{
    if(
        $categorie->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $categorie->delete();

    return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Catégorie supprimée'
            );
}
}
