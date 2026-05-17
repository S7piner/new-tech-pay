<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePaie extends Model
{
    use HasFactory;

    protected $fillable = [

        'entreprise_id',

        'mois',

        'annee',

        'trimestre',

        'date_debut',

        'date_fin',

        'statut',

        'observation',

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
    | FORMAT PERIODE
    |--------------------------------------------------------------------------
    */

    public function getPeriodeAttribute()
    {
        return $this->mois . ' ' . $this->annee;
    }
}
