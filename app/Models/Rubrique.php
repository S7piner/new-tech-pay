<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    use HasFactory;

    protected $fillable = [

        'entreprise_id',

        'code',

        'libelle',

        'type',

        'taux',

        'montant',

        'base_calcul',

        'est_imposable_irpp',

        'est_cotisable_cnss',

        'est_cotisable_cnamgs',

        'compte_comptable_debit',

        'compte_comptable_credit',

        'description',

        'actif',

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
}
