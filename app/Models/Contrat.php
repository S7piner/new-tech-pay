<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [

        'entreprise_id',

        'employe_id',

        'poste_id',

        'categorie_id',

        'type_contrat',

        'salaire_base',

        'date_debut',

        'date_fin',

        'statut',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function entreprise()
    {
        return $this->belongsTo(
            Entreprise::class
        );
    }

    public function employe()
    {
        return $this->belongsTo(
            Employe::class
        );
    }

    public function poste()
    {
        return $this->belongsTo(
            Poste::class
        );
    }

    public function categorie()
    {
        return $this->belongsTo(
            Categorie::class
        );
    }
}
