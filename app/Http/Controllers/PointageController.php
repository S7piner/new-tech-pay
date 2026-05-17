<?php

namespace App\Http\Controllers;

use App\Models\Pointage;
use App\Models\Employe;
use Illuminate\Http\Request;

class PointageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pointages = Pointage::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->latest()->get();

        return view(
            'pointages.index',
            compact('pointages')
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

        )->orderBy('nom')->get();

        return view(
            'pointages.create',
            compact('employes')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'employe_id' => 'required',

            'date' => 'required',

        ]);

        Pointage::create([

            'entreprise_id'
                => auth()->user()->entreprise_id,

            'employe_id'
                => $request->employe_id,

            'date'
                => $request->date,

            'heure_arrivee'
                => $request->heure_arrivee,

            'heure_depart'
                => $request->heure_depart,

            'heures_normales'
                => $request->heures_normales ?? 0,

            'heures_supp_10'
                => $request->heures_supp_10 ?? 0,

            'heures_supp_30'
                => $request->heures_supp_30 ?? 0,

            'heures_supp_40'
                => $request->heures_supp_40 ?? 0,

            'heures_supp_70'
                => $request->heures_supp_70 ?? 0,

            'retard_minutes'
                => $request->retard_minutes ?? 0,

            'absence'
                => $request->absence ?? false,

            'panier'
                => $request->panier ?? 0,

            'observation'
                => $request->observation,

            'statut'
                => $request->statut ?? 'présent',

        ]);

        return redirect()
                ->route('pointages.index')
                ->with(
                    'success',
                    'Pointage enregistré'
                );
    }

    /**
     * Display the specified resource.
     */
    public function show(Pointage $pointage)
    {
        return view(
            'pointages.show',
            compact('pointage')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pointage $pointage)
    {
        $employes = Employe::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->orderBy('nom')->get();

        return view(
            'pointages.edit',
            compact(
                'pointage',
                'employes'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Pointage $pointage
    )
    {
        $request->validate([

            'employe_id' => 'required',

            'date' => 'required',

        ]);

        $pointage->update([

            'employe_id'
                => $request->employe_id,

            'date'
                => $request->date,

            'heure_arrivee'
                => $request->heure_arrivee,

            'heure_depart'
                => $request->heure_depart,

            'heures_normales'
                => $request->heures_normales ?? 0,

            'heures_supp_10'
                => $request->heures_supp_10 ?? 0,

            'heures_supp_30'
                => $request->heures_supp_30 ?? 0,

            'heures_supp_40'
                => $request->heures_supp_40 ?? 0,

            'heures_supp_70'
                => $request->heures_supp_70 ?? 0,

            'retard_minutes'
                => $request->retard_minutes ?? 0,

            'absence'
                => $request->absence ?? false,

            'panier'
                => $request->panier ?? 0,

            'observation'
                => $request->observation,

            'statut'
                => $request->statut,

        ]);

        return redirect()
                ->route('pointages.index')
                ->with(
                    'success',
                    'Pointage modifié'
                );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pointage $pointage)
    {
        $pointage->delete();

        return redirect()
                ->route('pointages.index')
                ->with(
                    'success',
                    'Pointage supprimé'
                );
    }
}
