<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_entreprise',
        'sigle',
        'activite',
        'secteur',
        'nif',
        'cnss',
        'cnamgs',
        'telephone',
        'email',
        'ville',
        'region',
        'pays',
        'adresse',
        'logo',
        'statut'
    ];

    public function users()
{
    return $this->hasMany(User::class);
}

public function categories()
{
    return $this->hasMany(Categorie::class);
}

public function employes()
{
    return $this->hasMany(Employe::class);
}

public function postes()
{
    return $this->hasMany(Poste::class);
}
}


