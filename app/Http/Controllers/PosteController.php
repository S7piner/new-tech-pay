<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $postes = Poste::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->latest()->get();

    return view(

        'postes.index',

        compact('postes')

    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('postes.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nom' => 'required',

        'salaire_base' => 'nullable|numeric',

    ]);

    Poste::create([

        'entreprise_id'
            => auth()->user()->entreprise_id,

        'nom' => $request->nom,

        'description' => $request->description,

        'salaire_base' => $request->salaire_base,

        'statut' => true,

    ]);

    return redirect()
            ->route('postes.index')
            ->with(
                'success',
                'Poste créé'
            );
}

    /**
     * Display the specified resource.
     */
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poste $poste)
{
    if(
        $poste->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    return view(
        'postes.edit',
        compact('poste')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    Poste $poste
)
{
    if(
        $poste->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $request->validate([

        'nom' => 'required',

        'salaire_base' => 'nullable|numeric',

    ]);

    $poste->update([

        'nom' => $request->nom,

        'description' => $request->description,

        'salaire_base' => $request->salaire_base,

        'statut' => $request->statut,

    ]);

    return redirect()
            ->route('postes.index')
            ->with(
                'success',
                'Poste modifié'
            );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poste $poste)
{
    if(
        $poste->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $poste->delete();

    return redirect()
            ->route('postes.index')
            ->with(
                'success',
                'Poste supprimé'
            );
}
}
