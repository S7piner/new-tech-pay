<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $fillable = [

        'entreprise_id',

        'employe_id',

        'periode_paie_id',

        'salaire_base',

        'total_gains',

        'total_retenues',

        'brut',

        'net_a_payer',

        'cnss',

        'cnamgs',

        'irpp',

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
    | RELATION EMPLOYE
    |--------------------------------------------------------------------------
    */

    public function employe()
    {
        return $this->belongsTo(
            Employe::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION PERIODE
    |--------------------------------------------------------------------------
    */

    public function periodePaie()
    {
        return $this->belongsTo(
            PeriodePaie::class
        );
    }


    /*
|--------------------------------------------------------------------------
| RELATION LIGNES BULLETIN
|--------------------------------------------------------------------------
*/

public function lignes()
{
    return $this->hasMany(
        LigneBulletin::class
    );
}
}
