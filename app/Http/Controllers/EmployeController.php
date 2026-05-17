<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use App\Models\Poste;
use App\Models\Categorie;
use App\Models\CentreCout;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $employes = Employe::where(
        'entreprise_id',
        auth()->user()->entreprise_id
    )->get();

    return view('employes.index', compact('employes'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Categorie::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->get();

    $postes = Poste::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->get();

    $centres = CentreCout::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->get();

    return view(
        'employes.create',
        compact(
            'categories',
            'postes',
            'centres'
        )
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nom' => 'required',

        'prenom' => 'required',

        'salaire_base' => 'required',

    ]);

    $photo = null;

    if($request->hasFile('photo'))
    {
        $photo = $request->file('photo')
                         ->store('employes', 'public');
    }

    Employe::create([

        'entreprise_id' => auth()->user()->entreprise_id,

        'matricule' => $request->matricule,

        'nom' => $request->nom,

        'prenom' => $request->prenom,

        'telephone' => $request->telephone,

        'date_naissance' => $request->date_naissance,

'sexe' => $request->sexe,

'situation_matrimoniale'
    => $request->situation_matrimoniale,

'nombre_enfants'
    => $request->nombre_enfants,

'adresse' => $request->adresse,

'ville' => $request->ville,

'nationalite' => $request->nationalite,

'contact_urgence'
    => $request->contact_urgence,

'type_employe'
    => $request->type_employe,

        'email' => $request->email,

        'poste_id' => $request->poste_id,

        'categorie_id' => $request->categorie_id,

        'centre_cout_id'
    => $request->centre_cout_id,

        'date_embauche' => $request->date_embauche,

        'salaire_base' => $request->salaire_base,

        'cnss' => $request->cnss,

        'cnamgs' => $request->cnamgs,

        'photo' => $photo,

        'statut' => 'actif',

    ]);

    return redirect()
            ->route('employes.index')
            ->with('success', 'Employé ajouté');
}

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
{
    if(
        $employe->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    return view(
        'employes.show',
        compact('employe')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
{
    if(
        $employe->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $postes = Poste::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    $categories = Categorie::where(

        'entreprise_id',

        auth()->user()->entreprise_id

    )->where(

        'statut',

        true

    )->get();

    $centres = CentreCout::where(

    'entreprise_id',

    auth()->user()->entreprise_id

)->get();

    return view(

        'employes.edit',

        compact(

    'employe',

    'categories',

    'postes',

    'centres'

)

    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
{
    if(
        $employe->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $request->validate([

        'nom' => 'required',

        'prenom' => 'required',

        'salaire_base' => 'required',

    ]);

    $photo = $employe->photo;

    if($request->hasFile('photo'))
    {
        $photo = $request->file('photo')
                         ->store('employes', 'public');
    }

    $employe->update([

        'matricule' => $request->matricule,

        'nom' => $request->nom,

        'prenom' => $request->prenom,

        'telephone' => $request->telephone,

        'date_naissance' => $request->date_naissance,

'sexe' => $request->sexe,

'situation_matrimoniale'
    => $request->situation_matrimoniale,

'nombre_enfants'
    => $request->nombre_enfants,

'adresse' => $request->adresse,

'ville' => $request->ville,

'nationalite' => $request->nationalite,

'contact_urgence'
    => $request->contact_urgence,

'type_employe'
    => $request->type_employe,

        'email' => $request->email,

        'poste_id' => $request->poste_id,

        'categorie_id' => $request->categorie_id,

        'centre_cout_id'
    => $request->centre_cout_id,

        'date_embauche' => $request->date_embauche,

        'salaire_base' => $request->salaire_base,

        'cnss' => $request->cnss,

        'cnamgs' => $request->cnamgs,

        'photo' => $photo,

        'statut' => $request->statut,

    ]);

    return redirect()
            ->route('employes.index')
            ->with('success', 'Employé modifié');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
{
    if(
        $employe->entreprise_id
        != auth()->user()->entreprise_id
    ){
        abort(403);
    }

    $employe->delete();

    return redirect()
            ->route('employes.index')
            ->with('success', 'Employé supprimé');
}
}
