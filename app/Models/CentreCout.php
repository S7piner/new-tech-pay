<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreCout extends Model
{
    use HasFactory;

    protected $table = 'centres_cout';

    protected $fillable = [

        'entreprise_id',

        'nom',

        'code',

        'type',

        'responsable',

        'telephone',

        'email',

        'localisation',

        'budget',

        'description',

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

    public function employes()
    {
        return $this->hasMany(
            Employe::class
        );
    }
}
