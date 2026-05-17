@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Nouvel Employé
        </h1>

        <p>
            Ajouter un employé dans votre entreprise
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route('employes.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <!-- INFOS PERSONNELLES -->

        <h2 class="section-title">

            Informations Personnelles

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>Matricule</label>

                <input type="text"
                       name="matricule">

            </div>

            <div class="form-group">

                <label>Nom</label>

                <input type="text"
                       name="nom">

            </div>

            <div class="form-group">

                <label>Prénom</label>

                <input type="text"
                       name="prenom">

            </div>

            <div class="form-group">

                <label>Téléphone</label>

                <input type="text"
                       name="telephone">

            </div>

            <div class="form-group">

                <label>Email</label>

                <input type="email"
                       name="email">

            </div>

            <div class="form-group">

                <label>Date naissance</label>

                <input type="date"
                       name="date_naissance">

            </div>

            <div class="form-group">

                <label>Sexe</label>

                <select name="sexe">

                    <option value="">
                        Choisir
                    </option>

                    <option value="Masculin">
                        Masculin
                    </option>

                    <option value="Féminin">
                        Féminin
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Situation matrimoniale</label>

                <select name="situation_matrimoniale">

                    <option value="">
                        Choisir
                    </option>

                    <option value="Célibataire">
                        Célibataire
                    </option>

                    <option value="Marié(e)">
                        Marié(e)
                    </option>

                    <option value="Divorcé(e)">
                        Divorcé(e)
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Nombre enfants</label>

                <input type="number"
                       name="nombre_enfants"
                       value="0">

            </div>

            <div class="form-group">

                <label>Ville</label>

                <input type="text"
                       name="ville">

            </div>

            <div class="form-group">

                <label>Nationalité</label>

                <input type="text"
                       name="nationalite">

            </div>

            <div class="form-group">

                <label>Contact urgence</label>

                <input type="text"
                       name="contact_urgence">

            </div>

        </div>

        <!-- ADRESSE -->

        <div class="form-group">

            <label>Adresse</label>

            <textarea name="adresse"></textarea>

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

                    <option value="">
                        Choisir
                    </option>

                    <option value="Permanent">
                        Permanent
                    </option>

                    <option value="Journalier">
                        Journalier
                    </option>

                    <option value="Temporaire">
                        Temporaire
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Poste</label>

                <select name="poste_id">

                    <option value="">
                        Choisir
                    </option>

                    @foreach($postes as $poste)

                        <option value="{{ $poste->id }}">

                            {{ $poste->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Catégorie</label>

                <select name="categorie_id">

                    <option value="">
                        Choisir
                    </option>

                    @foreach($categories as $categorie)

                        <option value="{{ $categorie->id }}">

                            {{ $categorie->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Centre de coût</label>

                <select name="centre_cout_id">

                    <option value="">
                        Choisir
                    </option>

                    @foreach($centres as $centre)

                        <option value="{{ $centre->id }}">

                            {{ $centre->nom }}

                            ({{ $centre->type }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Date embauche</label>

                <input type="date"
                       name="date_embauche">

            </div>

            <div class="form-group">

                <label>Salaire base</label>

                <input type="number"
                       name="salaire_base">

            </div>

            <div class="form-group">

                <label>CNSS</label>

                <input type="text"
                       name="cnss">

            </div>

            <div class="form-group">

                <label>CNAMGS</label>

                <input type="text"
                       name="cnamgs">

            </div>

            <div class="form-group">

                <label>Photo</label>

                <input type="file"
                       name="photo">

            </div>

        </div>

        <button type="submit"
                class="save-btn">

            Enregistrer Employé

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
