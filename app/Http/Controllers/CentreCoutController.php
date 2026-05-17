<?php

namespace App\Http\Controllers;

use App\Models\CentreCout;
use Illuminate\Http\Request;

class CentreCoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $centres = CentreCout::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->latest()->get();

    return view(
        'centres-cout.index',
        compact('centres')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view(
        'centres-cout.create'
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nom' => 'required',

    ]);

    CentreCout::create([

        'entreprise_id'
            => auth()->user()->entreprise_id,

        'nom' => $request->nom,

        'code' => $request->code,

        'type' => $request->type,

        'responsable'
            => $request->responsable,

        'telephone'
            => $request->telephone,

        'email'
            => $request->email,

        'localisation'
            => $request->localisation,

        'budget'
            => $request->budget,

        'description'
            => $request->description,

        'statut' => 'actif',

    ]);

    return redirect()
            ->route('centres-cout.index')
            ->with(
                'success',
                'Centre créé'
            );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CentreCout $centres_cout)
{
    return view(
        'centres-cout.edit',
        compact('centres_cout')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    Request $request,
    CentreCout $centres_cout
)
{
    $request->validate([

        'nom' => 'required',

    ]);

    $centres_cout->update([

        'nom' => $request->nom,

        'code' => $request->code,

        'type' => $request->type,

        'responsable'
            => $request->responsable,

        'telephone'
            => $request->telephone,

        'email'
            => $request->email,

        'localisation'
            => $request->localisation,

        'budget'
            => $request->budget,

        'description'
            => $request->description,

    ]);

    return redirect()
            ->route(
                'centres-cout.index'
            )
            ->with(
                'success',
                'Centre modifié'
            );
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
    CentreCout $centres_cout
)
{
    $centres_cout->delete();

    return redirect()
            ->route(
                'centres-cout.index'
            )
            ->with(
                'success',
                'Centre supprimé'
            );
}
}
