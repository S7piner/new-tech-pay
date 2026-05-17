<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    protected $fillable = [

        'entreprise_id',

        'nom',

        'description',

        'salaire_base',

        'statut',

    ];

public function entreprise()
{
    return $this->belongsTo(Entreprise::class);
}

}
