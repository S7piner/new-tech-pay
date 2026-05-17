@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Modifier Employé
        </h1>

        <p>
            Modification des informations de l'employé
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'employes.update',
            $employe->id
        ) }}"

          method="POST"

          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <!-- INFOS PERSONNELLES -->

        <h2 class="section-title">

            Informations Personnelles

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>Matricule</label>

                <input type="text"
                       name="matricule"
                       value="{{ $employe->matricule }}">

            </div>

            <div class="form-group">

                <label>Nom</label>

                <input type="text"
                       name="nom"
                       value="{{ $employe->nom }}">

            </div>

            <div class="form-group">

                <label>Prénom</label>

                <input type="text"
                       name="prenom"
                       value="{{ $employe->prenom }}">

            </div>

            <div class="form-group">

                <label>Téléphone</label>

                <input type="text"
                       name="telephone"
                       value="{{ $employe->telephone }}">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ $employe->email }}">

            </div>

            <div class="form-group">

                <label>Date naissance</label>

                <input type="date"
                       name="date_naissance"
                       value="{{ $employe->date_naissance }}">

            </div>

            <div class="form-group">

                <label>Sexe</label>

                <select name="sexe">

                    <option value="Masculin"
                        {{ $employe->sexe == 'Masculin'
                            ? 'selected'
                            : '' }}>

                        Masculin

                    </option>

                    <option value="Féminin"
                        {{ $employe->sexe == 'Féminin'
                            ? 'selected'
                            : '' }}>

                        Féminin

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Situation matrimoniale</label>

                <select name="situation_matrimoniale">

                    <option value="Célibataire"
                        {{ $employe->situation_matrimoniale == 'Célibataire'
                            ? 'selected'
                            : '' }}>

                        Célibataire

                    </option>

                    <option value="Marié(e)"
                        {{ $employe->situation_matrimoniale == 'Marié(e)'
                            ? 'selected'
                            : '' }}>

                        Marié(e)

                    </option>

                    <option value="Divorcé(e)"
                        {{ $employe->situation_matrimoniale == 'Divorcé(e)'
                            ? 'selected'
                            : '' }}>

                        Divorcé(e)

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Nombre enfants</label>

                <input type="number"
                       name="nombre_enfants"
                       value="{{ $employe->nombre_enfants }}">

            </div>

            <div class="form-group">

                <label>Ville</label>

                <input type="text"
                       name="ville"
                       value="{{ $employe->ville }}">

            </div>

            <div class="form-group">

                <label>Nationalité</label>

                <input type="text"
                       name="nationalite"
                       value="{{ $employe->nationalite }}">

            </div>

            <div class="form-group">

                <label>Contact urgence</label>

                <input type="text"
                       name="contact_urgence"
                       value="{{ $employe->contact_urgence }}">

            </div>

        </div>

        <!-- ADRESSE -->

        <div class="form-group">

            <label>Adresse</label>

            <textarea name="adresse">{{ $employe->adresse }}</textarea>

        </div>

        <br>

        <!-- INFOS PROFESSIONNELLES -->

        <h2 class="section-title">

            Informations Professionnelles

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>Type Employé</label>

                <select name="type_employe">

                    <option value="Permanent"
                        {{ $employe->type_employe == 'Permanent'
                            ? 'selected'
                            : '' }}>

                        Permanent

                    </option>

                    <option value="Journalier"
                        {{ $employe->type_employe == 'Journalier'
                            ? 'selected'
                            : '' }}>

                        Journalier

                    </option>

                    <option value="Temporaire"
                        {{ $employe->type_employe == 'Temporaire'
                            ? 'selected'
                            : '' }}>

                        Temporaire

                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Poste</label>

                <select name="poste_id">

                    @foreach($postes as $poste)

                        <option value="{{ $poste->id }}"

                            {{ $employe->poste_id == $poste->id
                                ? 'selected'
                                : '' }}>

                            {{ $poste->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Catégorie</label>

                <select name="categorie_id">

                    @foreach($categories as $categorie)

                        <option value="{{ $categorie->id }}"

                            {{ $employe->categorie_id == $categorie->id
                                ? 'selected'
                                : '' }}>

                            {{ $categorie->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Centre de coût</label>

                <select name="centre_cout_id">

                    @foreach($centres as $centre)

                        <option value="{{ $centre->id }}"

                            {{ $employe->centre_cout_id == $centre->id
                                ? 'selected'
                                : '' }}>

                            {{ $centre->nom }}

                            ({{ $centre->type }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Date embauche</label>

                <input type="date"
                       name="date_embauche"
                       value="{{ $employe->date_embauche }}">

            </div>

            <div class="form-group">

                <label>Salaire base</label>

                <input type="number"
                       name="salaire_base"
                       value="{{ $employe->salaire_base }}">

            </div>

            <div class="form-group">

                <label>CNSS</label>

                <input type="text"
                       name="cnss"
                       value="{{ $employe->cnss }}">

            </div>

            <div class="form-group">

                <label>CNAMGS</label>

                <input type="text"
                       name="cnamgs"
                       value="{{ $employe->cnamgs }}">

            </div>

            <div class="form-group">

                <label>Changer Photo</label>

                <input type="file"
                       name="photo">

            </div>

        </div>

        <button type="submit"
                class="save-btn">

            Modifier Employé

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
