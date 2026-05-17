<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory;

    protected $fillable = [

        'entreprise_id',

        'employe_id',

        'date',

        'heure_arrivee',

        'heure_depart',

        'heures_normales',

        'heures_supp_10',

        'heures_supp_30',

        'heures_supp_40',

        'heures_supp_70',

        'retard_minutes',

        'absence',

        'panier',

        'observation',

        'statut',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION ENTREPRISE
    |--------------------------------------------------------------------------
    */

    public function entreprise()
    {
        return $this->belongsTo(
            Entreprise::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION EMPLOYE
    |--------------------------------------------------------------------------
    */

    public function employe()
    {
        return $this->belongsTo(
            Employe::class
        );
    }
}
