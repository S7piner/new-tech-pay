<?php

namespace App\Http\Controllers;

use App\Models\Rubrique;
use Illuminate\Http\Request;

class RubriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rubriques = Rubrique::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->latest()->get();

        return view(
            'rubriques.index',
            compact('rubriques')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'rubriques.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'libelle' => 'required',

            'type' => 'required',

        ]);

        Rubrique::create([

            'entreprise_id'
                => auth()->user()->entreprise_id,

            'code'
                => $request->code,

            'libelle'
                => $request->libelle,

            'type'
                => $request->type,

            'taux'
                => $request->taux ?? 0,

            'montant'
                => $request->montant ?? 0,

            'base_calcul'
                => $request->base_calcul,

            'est_imposable_irpp'
                => $request->est_imposable_irpp ?? false,

            'est_cotisable_cnss'
                => $request->est_cotisable_cnss ?? false,

            'est_cotisable_cnamgs'
                => $request->est_cotisable_cnamgs ?? false,

            'compte_comptable_debit'
                => $request->compte_comptable_debit,

            'compte_comptable_credit'
                => $request->compte_comptable_credit,

            'description'
                => $request->description,

            'actif'
                => $request->actif ?? true,

        ]);

        return redirect()
                ->route('rubriques.index')
                ->with(
                    'success',
                    'Rubrique créée'
                );
    }

    /**
     * Display the specified resource.
     */
    public function show(Rubrique $rubrique)
    {
        return view(
            'rubriques.show',
            compact('rubrique')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rubrique $rubrique)
    {
        return view(
            'rubriques.edit',
            compact('rubrique')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Rubrique $rubrique
    )
    {
        $request->validate([

            'libelle' => 'required',

            'type' => 'required',

        ]);

        $rubrique->update([

            'code'
                => $request->code,

            'libelle'
                => $request->libelle,

            'type'
                => $request->type,

            'taux'
                => $request->taux ?? 0,

            'montant'
                => $request->montant ?? 0,

            'base_calcul'
                => $request->base_calcul,

            'est_imposable_irpp'
                => $request->est_imposable_irpp ?? false,

            'est_cotisable_cnss'
                => $request->est_cotisable_cnss ?? false,

            'est_cotisable_cnamgs'
                => $request->est_cotisable_cnamgs ?? false,

            'compte_comptable_debit'
                => $request->compte_comptable_debit,

            'compte_comptable_credit'
                => $request->compte_comptable_credit,

            'description'
                => $request->description,

            'actif'
                => $request->actif ?? true,

        ]);

        return redirect()
                ->route('rubriques.index')
                ->with(
                    'success',
                    'Rubrique modifiée'
                );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rubrique $rubrique)
    {
        $rubrique->delete();

        return redirect()
                ->route('rubriques.index')
                ->with(
                    'success',
                    'Rubrique supprimée'
                );
    }
}
