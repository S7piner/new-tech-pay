<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprise::latest()->get();

        return view(
            'entreprises.index',
            compact('entreprises')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            // ENTREPRISE

            'nom_entreprise' => 'required',

            'telephone' => 'required',

            // ADMIN ENTREPRISE

            'name' => 'required',

            'user_email' => 'required|email|unique:users,email',

            'password' => 'required|min:6',

        ]);

        $logo = null;

        // UPLOAD LOGO

        if($request->hasFile('logo'))
        {
            $logo = $request->file('logo')
                            ->store('logos', 'public');
        }

        // CREATION ENTREPRISE

        $entreprise = Entreprise::create([

            'nom_entreprise' => $request->nom_entreprise,

            'sigle' => $request->sigle,

            'activite' => $request->activite,

            'secteur' => $request->secteur,

            'nif' => $request->nif,

            'cnss' => $request->cnss,

            'cnamgs' => $request->cnamgs,

            'telephone' => $request->telephone,

            'email' => $request->email,

            'ville' => $request->ville,

            'region' => $request->region,

            'pays' => $request->pays,

            'adresse' => $request->adresse,

            'logo' => $logo,

            'statut' => true,

        ]);

        // CREATION ADMIN ENTREPRISE

        $user = User::create([

            'name' => $request->name,

            'email' => $request->user_email,

            'password' => Hash::make($request->password),

            'entreprise_id' => $entreprise->id,

            'role' => 'admin',

        ]);

        // CONNEXION AUTOMATIQUE

        Auth::login($user);

        // REDIRECTION DASHBOARD

        return redirect()
                ->route('dashboard')
                ->with(
                    'success',
                    'Entreprise créée avec succès'
                );
    }

    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entreprise $entreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
