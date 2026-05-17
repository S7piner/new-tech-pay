<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBulletin extends Model
{
    use HasFactory;

    protected $fillable = [

        'bulletin_id',

        'rubrique_id',

        'libelle',

        'type',

        'montant',

        'taux',

        'quantite',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION BULLETIN
    |--------------------------------------------------------------------------
    */

    public function bulletin()
    {
        return $this->belongsTo(
            Bulletin::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION RUBRIQUE
    |--------------------------------------------------------------------------
    */

    public function rubrique()
    {
        return $this->belongsTo(
            Rubrique::class
        );
    }
}
