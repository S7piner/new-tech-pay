<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [

    'entreprise_id',

    'poste_id',

    'categorie_id',

    'matricule',

    'nom',

    'prenom',

    'telephone',

    'email',

    'date_embauche',

    'salaire_base',

    'cnss',

    'cnamgs',

    'photo',

    'date_naissance',

'sexe',

'situation_matrimoniale',

'nombre_enfants',

'nombre_parts_irpp',

'adresse',

'ville',

'nationalite',

'contact_urgence',

'type_employe',

'centre_cout_id',

    'statut',

];



public function entreprise()
{
    return $this->belongsTo(Entreprise::class);
}


public function poste()
{
    return $this->belongsTo(Poste::class);
}

public function categorie()
{
    return $this->belongsTo(Categorie::class);
}

public function contrats()
{
    return $this->hasMany(
        Contrat::class
    );
}

public function centreCout()
{
    return $this->belongsTo(
        CentreCout::class
    );
}

public function pointages()
{
    return $this->hasMany(
        Pointage::class
    );
}
}
