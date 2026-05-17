@extends('layouts.app')

@section('content')

<div class="profile-card">

    <!-- HEADER -->

    <div class="profile-header">

        @if($employe->photo)

            <img src="{{ asset(
                'storage/'.$employe->photo
            ) }}"

                 class="profile-photo">

        @else

            <div class="profile-avatar">

                {{ strtoupper(
                    substr(
                        $employe->nom,
                        0,
                        1
                    )
                ) }}

            </div>

        @endif

        <div>

            <h1 class="profile-name">

                {{ $employe->nom }}

                {{ $employe->prenom }}

            </h1>

            <p class="profile-poste">

                {{ $employe->poste->nom ?? '' }}

            </p>

            <span class="profile-badge">

                {{ $employe->statut }}

            </span>

        </div>

    </div>

    <!-- INFORMATIONS -->

    <h2 class="section-title">

        Informations Générales

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Matricule</strong>

            <p>

                {{ $employe->matricule }}

            </p>

        </div>

        <div class="info-card">

            <strong>Téléphone</strong>

            <p>

                {{ $employe->telephone }}

            </p>

        </div>

        <div class="info-card">

            <strong>Email</strong>

            <p>

                {{ $employe->email }}

            </p>

        </div>

        <div class="info-card">

            <strong>Sexe</strong>

            <p>

                {{ $employe->sexe }}

            </p>

        </div>

        <div class="info-card">

            <strong>Date naissance</strong>

            <p>

                {{ $employe->date_naissance }}

            </p>

        </div>

        <div class="info-card">

            <strong>Situation matrimoniale</strong>

            <p>

                {{ $employe->situation_matrimoniale }}

            </p>

        </div>

        <div class="info-card">

            <strong>Nombre enfants</strong>

            <p>

                {{ $employe->nombre_enfants }}

            </p>

        </div>

        <div class="info-card">

            <strong>Ville</strong>

            <p>

                {{ $employe->ville }}

            </p>

        </div>

        <div class="info-card">

            <strong>Nationalité</strong>

            <p>

                {{ $employe->nationalite }}

            </p>

        </div>

        <div class="info-card">

            <strong>Adresse</strong>

            <p>

                {{ $employe->adresse }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- INFORMATIONS PROFESSIONNELLES -->

    <h2 class="section-title">

        Informations Professionnelles

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Type Employé</strong>

            <p>

                {{ $employe->type_employe }}

            </p>

        </div>

        <div class="info-card">

            <strong>Poste</strong>

            <p>

                {{ $employe->poste->nom ?? '' }}

            </p>

        </div>

        <div class="info-card">

            <strong>Catégorie</strong>

            <p>

                {{ $employe->categorie->nom ?? '' }}

            </p>

        </div>

        <div class="info-card">

            <strong>Centre de coût</strong>

            <p>

                {{ $employe->centreCout->nom ?? '' }}

            </p>

        </div>

        <div class="info-card">

            <strong>Date embauche</strong>

            <p>

                {{ $employe->date_embauche }}

            </p>

        </div>

        <div class="info-card">

            <strong>Salaire Base</strong>

            <p>

                {{ number_format(
                    $employe->salaire_base,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>CNSS</strong>

            <p>

                {{ $employe->cnss }}

            </p>

        </div>

        <div class="info-card">

            <strong>CNAMGS</strong>

            <p>

                {{ $employe->cnamgs }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- ACTIONS -->

    <div style="
        display:flex;
        gap:15px;
        flex-wrap:wrap;
    ">

        <a href="{{ route(
            'employes.edit',
            $employe->id
        ) }}"

           class="save-btn"

           style="
                text-decoration:none;
                display:inline-block;
           ">

            Modifier Employé

        </a>

        <a href="{{ route(
            'employes.index'
        ) }}"

           style="
                background:#e2e8f0;
                color:#0f172a;
                padding:16px 28px;
                border-radius:14px;
                text-decoration:none;
                font-weight:700;
           ">

            Retour Liste

        </a>

    </div>

</div>

@include('employes.styles')

@endsection
