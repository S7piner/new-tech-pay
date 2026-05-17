<?php

namespace App\Http\Controllers;

use App\Models\PeriodePaie;
use Illuminate\Http\Request;

class PeriodePaieController extends Controller
{
    /**
     * Display listing.
     */
    public function index()
    {
        $periodes = PeriodePaie::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->latest()->get();

        return view(
            'periodes-paie.index',
            compact('periodes')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'periodes-paie.create'
        );
    }

    /**
     * Store new periode.
     */
    public function store(Request $request)
    {
        $request->validate([

            'mois' => 'required',

            'annee' => 'required',

            'date_debut' => 'required',

            'date_fin' => 'required',

        ]);

        PeriodePaie::create([

            'entreprise_id'
                => auth()->user()->entreprise_id,

            'mois'
                => $request->mois,

            'annee'
                => $request->annee,

            'trimestre'
                => $request->trimestre,

            'date_debut'
                => $request->date_debut,

            'date_fin'
                => $request->date_fin,

            'statut'
                => $request->statut,

            'observation'
                => $request->observation,

        ]);

        return redirect()
                ->route(
                    'periodes-paie.index'
                )
                ->with(
                    'success',
                    'Période créée'
                );
    }

    /**
     * Show periode.
     */
    public function show($id)
{
    $periodePaie = PeriodePaie::findOrFail($id);

    return view(
        'periodes-paie.show',
        compact('periodePaie')
    );
}

    /**
     * Edit form.
     */
    public function edit($id)
{
    $periodePaie = PeriodePaie::findOrFail($id);

    return view(
        'periodes-paie.edit',
        compact('periodePaie')
    );
}

    /**
     * Update periode.
     */
    public function update(
        Request $request,
        PeriodePaie $periodePaie
    )
    {
        $request->validate([

            'mois' => 'required',

            'annee' => 'required',

            'date_debut' => 'required',

            'date_fin' => 'required',

        ]);

        $periodePaie->update([

            'mois'
                => $request->mois,

            'annee'
                => $request->annee,

            'trimestre'
                => $request->trimestre,

            'date_debut'
                => $request->date_debut,

            'date_fin'
                => $request->date_fin,

            'statut'
                => $request->statut,

            'observation'
                => $request->observation,

        ]);

        return redirect()
                ->route(
                    'periodes-paie.index'
                )
                ->with(
                    'success',
                    'Période modifiée'
                );
    }

    /**
     * Delete periode.
     */
    public function destroy(
        PeriodePaie $periodePaie
    )
    {
        $periodePaie->delete();

        return redirect()
                ->route(
                    'periodes-paie.index'
                )
                ->with(
                    'success',
                    'Période supprimée'
                );
    }
}
