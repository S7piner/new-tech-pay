<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\Employe;
use App\Models\PeriodePaie;
use App\Models\LigneBulletin;
use App\Models\Pointage;
use App\Models\Rubrique;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BulletinController extends Controller
{
    /**
     * Liste bulletins
     */
    public function index()
    {
        $bulletins = Bulletin::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->latest()->get();

        return view(
            'bulletins.index',
            compact('bulletins')
        );
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $employes = Employe::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->get();

        $periodes = PeriodePaie::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->get();

        return view(
            'bulletins.create',
            compact(
                'employes',
                'periodes'
            )
        );
    }

    /**
     * Enregistrer bulletin
     */
    public function store(Request $request)
    {
        $request->validate([

            'employe_id'
                => 'required',

            'periode_paie_id'
                => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | EMPLOYE
        |--------------------------------------------------------------------------
        */

        $employe = Employe::findOrFail(
            $request->employe_id
        );

        /*
        |--------------------------------------------------------------------------
        | SALAIRE BASE
        |--------------------------------------------------------------------------
        */

        $salaireBase = $employe->salaire_base;

        /*
        |--------------------------------------------------------------------------
        | PERIODE
        |--------------------------------------------------------------------------
        */

        $periode = PeriodePaie::findOrFail(
            $request->periode_paie_id
        );

        /*
        |--------------------------------------------------------------------------
        | POINTAGES
        |--------------------------------------------------------------------------
        */

        $pointages = Pointage::where(

            'employe_id',

            $employe->id

        )

        ->whereBetween('date', [

            $periode->date_debut,

            $periode->date_fin

        ])

        ->get();

        /*
        |--------------------------------------------------------------------------
        | HEURES SUPP
        |--------------------------------------------------------------------------
        */

        $hs10 = $pointages->sum(
            'heures_supp_10'
        );

        $hs30 = $pointages->sum(
            'heures_supp_30'
        );

        $hs40 = $pointages->sum(
            'heures_supp_40'
        );

        $hs70 = $pointages->sum(
            'heures_supp_70'
        );

        /*
        |--------------------------------------------------------------------------
        | PRIMES
        |--------------------------------------------------------------------------
        */

        $panier = $pointages->sum(
            'panier'
        );

        $transport = $pointages->sum(
            'transport'
        );

        $primeDivers = $pointages->sum(
            'prime_divers'
        );

        $indemnite = $pointages->sum(
            'indemnite'
        );

        /*
        |--------------------------------------------------------------------------
        | TAUX HORAIRE
        |--------------------------------------------------------------------------
        */

        $tauxHoraire = $salaireBase / 173.33;

        /*
        |--------------------------------------------------------------------------
        | CALCUL HS
        |--------------------------------------------------------------------------
        */

        $montantHs10 =

            $hs10
            *
            $tauxHoraire
            *
            1.10;

        $montantHs30 =

            $hs30
            *
            $tauxHoraire
            *
            1.30;

        $montantHs40 =

            $hs40
            *
            $tauxHoraire
            *
            1.40;

        $montantHs70 =

            $hs70
            *
            $tauxHoraire
            *
            1.70;

        /*
        |--------------------------------------------------------------------------
        | TOTAL GAINS
        |--------------------------------------------------------------------------
        */

        $totalGains =

            $salaireBase

            +

            $montantHs10

            +

            $montantHs30

            +

            $montantHs40

            +

            $montantHs70

            +

            $panier

            +

            $transport

            +

            $primeDivers

            +

            $indemnite;

        /*
        |--------------------------------------------------------------------------
        | CALCULS RETENUES
        |--------------------------------------------------------------------------
        */

        $cnss = ($salaireBase * 5) / 100;

        $cnamgs = ($salaireBase * 2) / 100;

        $irpp = ($salaireBase * 3) / 100;

        $totalRetenues =

            $cnss
            +
            $cnamgs
            +
            $irpp;

        /*
        |--------------------------------------------------------------------------
        | BRUT / NET
        |--------------------------------------------------------------------------
        */

        $brut = $totalGains;

        $net = $brut - $totalRetenues;

        /*
        |--------------------------------------------------------------------------
        | CREATION BULLETIN
        |--------------------------------------------------------------------------
        */

        $bulletin = Bulletin::create([

            'entreprise_id'
                => auth()->user()->entreprise_id,

            'employe_id'
                => $request->employe_id,

            'periode_paie_id'
                => $request->periode_paie_id,

            'salaire_base'
                => $salaireBase,

            'total_gains'
                => $totalGains,

            'total_retenues'
                => $totalRetenues,

            'brut'
                => $brut,

            'net_a_payer'
                => $net,

            'cnss'
                => $cnss,

            'cnamgs'
                => $cnamgs,

            'irpp'
                => $irpp,

            'statut'
                => $request->statut,

            'observation'
                => $request->observation,

        ]);

        /*
        |--------------------------------------------------------------------------
        | RUBRIQUES ACTIVES
        |--------------------------------------------------------------------------
        */

        $rubriques = Rubrique::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )

        ->where(

            'actif',

            true

        )

        ->get()

        ->keyBy('libelle');

        /*
        |--------------------------------------------------------------------------
        | SALAIRE BASE
        |--------------------------------------------------------------------------
        */

        if(isset($rubriques['Salaire de Base'])){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Salaire de Base'
                    ]->id,

                'libelle'
                    => 'Salaire de Base',

                'type'
                    => 'gain',

                'montant'
                    => $salaireBase,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | CNSS
        |--------------------------------------------------------------------------
        */

        if(isset($rubriques['CNSS'])){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'CNSS'
                    ]->id,

                'libelle'
                    => 'CNSS',

                'type'
                    => 'retenue',

                'montant'
                    => $cnss,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | CNAMGS
        |--------------------------------------------------------------------------
        */

        if(isset($rubriques['CNAMGS'])){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'CNAMGS'
                    ]->id,

                'libelle'
                    => 'CNAMGS',

                'type'
                    => 'retenue',

                'montant'
                    => $cnamgs,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | IRPP
        |--------------------------------------------------------------------------
        */

        if(isset($rubriques['IRPP'])){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'IRPP'
                    ]->id,

                'libelle'
                    => 'IRPP',

                'type'
                    => 'retenue',

                'montant'
                    => $irpp,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HS 10
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Heures Supp 10%'
                ]
            )

            &&

            $montantHs10 > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Heures Supp 10%'
                    ]->id,

                'libelle'
                    => 'Heures Supp 10%',

                'type'
                    => 'gain',

                'montant'
                    => $montantHs10,

                'quantite'
                    => $hs10,

                'taux'
                    => 10,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HS 30
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Heures Supp 30%'
                ]
            )

            &&

            $montantHs30 > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Heures Supp 30%'
                    ]->id,

                'libelle'
                    => 'Heures Supp 30%',

                'type'
                    => 'gain',

                'montant'
                    => $montantHs30,

                'quantite'
                    => $hs30,

                'taux'
                    => 30,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HS 40
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Heures Supp 40%'
                ]
            )

            &&

            $montantHs40 > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Heures Supp 40%'
                    ]->id,

                'libelle'
                    => 'Heures Supp 40%',

                'type'
                    => 'gain',

                'montant'
                    => $montantHs40,

                'quantite'
                    => $hs40,

                'taux'
                    => 40,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HS 70
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Heures Supp 70%'
                ]
            )

            &&

            $montantHs70 > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Heures Supp 70%'
                    ]->id,

                'libelle'
                    => 'Heures Supp 70%',

                'type'
                    => 'gain',

                'montant'
                    => $montantHs70,

                'quantite'
                    => $hs70,

                'taux'
                    => 70,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | PANIER
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques['Panier']
            )

            &&

            $panier > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Panier'
                    ]->id,

                'libelle'
                    => 'Panier',

                'type'
                    => 'gain',

                'montant'
                    => $panier,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | TRANSPORT
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques['Transport']
            )

            &&

            $transport > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Transport'
                    ]->id,

                'libelle'
                    => 'Transport',

                'type'
                    => 'gain',

                'montant'
                    => $transport,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | PRIME DIVERS
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Prime Divers'
                ]
            )

            &&

            $primeDivers > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Prime Divers'
                    ]->id,

                'libelle'
                    => 'Prime Divers',

                'type'
                    => 'gain',

                'montant'
                    => $primeDivers,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | INDEMNITES
        |--------------------------------------------------------------------------
        */

        if(

            isset(
                $rubriques[
                    'Indemnités'
                ]
            )

            &&

            $indemnite > 0

        ){

            LigneBulletin::create([

                'bulletin_id'
                    => $bulletin->id,

                'rubrique_id'
                    => $rubriques[
                        'Indemnités'
                    ]->id,

                'libelle'
                    => 'Indemnités',

                'type'
                    => 'gain',

                'montant'
                    => $indemnite,

            ]);

        }

        return redirect()
                ->route(
                    'bulletins.index'
                )
                ->with(
                    'success',
                    'Bulletin généré avec succès'
                );
    }

    /**
     * Afficher bulletin
     */
    public function show($id)
    {
        $bulletin = Bulletin::findOrFail(
            $id
        );

        return view(
            'bulletins.show',
            compact('bulletin')
        );
    }

    /**
     * Formulaire modification
     */
    public function edit($id)
    {
        $bulletin = Bulletin::findOrFail(
            $id
        );

        $employes = Employe::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->get();

        $periodes = PeriodePaie::where(

            'entreprise_id',

            auth()->user()->entreprise_id

        )->get();

        return view(
            'bulletins.edit',
            compact(
                'bulletin',
                'employes',
                'periodes'
            )
        );
    }

    /**
     * Modifier bulletin
     */
    public function update(
        Request $request,
        $id
    )
    {
        $bulletin = Bulletin::findOrFail(
            $id
        );

        $bulletin->update([

            'statut'
                => $request->statut,

            'observation'
                => $request->observation,

        ]);

        return redirect()
                ->route(
                    'bulletins.index'
                )
                ->with(
                    'success',
                    'Bulletin modifié'
                );
    }

    /**
     * Supprimer bulletin
     */
    public function destroy($id)
    {
        $bulletin = Bulletin::findOrFail(
            $id
        );

        $bulletin->delete();

        return redirect()
                ->route(
                    'bulletins.index'
                )
                ->with(
                    'success',
                    'Bulletin supprimé'
                );
    }


    /**
 * PDF Bulletin
 */
public function pdf(Bulletin $bulletin)
{
    $pdf = Pdf::loadView(

        'bulletins.pdf',

        compact('bulletin')

    );

    return $pdf->download(

        'bulletin-'.$bulletin->id.'.pdf'

    );
}
}
