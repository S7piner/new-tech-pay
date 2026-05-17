@extends('layouts.app')

@section('content')

<div class="profile-card">

    <!-- HEADER -->

    <div class="profile-header">

        @if($pointage->employe->photo)

            <img src="{{ asset(
                'storage/'.
                $pointage->employe->photo
            ) }}"

                 class="profile-photo">

        @else

            <div class="profile-avatar">

                {{ strtoupper(
                    substr(
                        $pointage
                        ->employe
                        ->nom,
                        0,
                        1
                    )
                ) }}

            </div>

        @endif

        <div>

            <h1 class="profile-name">

                {{ $pointage->employe->nom }}

                {{ $pointage->employe->prenom }}

            </h1>

            <p class="profile-poste">

                {{ $pointage
                    ->employe
                    ->poste
                    ->nom ?? '' }}

            </p>

            <span class="profile-badge">

                {{ $pointage->statut }}

            </span>

        </div>

    </div>

    <!-- INFORMATIONS PRINCIPALES -->

    <h2 class="section-title">

        Informations Générales

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Date</strong>

            <p>

                {{ $pointage->date }}

            </p>

        </div>

        <div class="info-card">

            <strong>Heure arrivée</strong>

            <p>

                {{ $pointage
                    ->heure_arrivee }}

            </p>

        </div>

        <div class="info-card">

            <strong>Heure départ</strong>

            <p>

                {{ $pointage
                    ->heure_depart }}

            </p>

        </div>

        <div class="info-card">

            <strong>Heures normales</strong>

            <p>

                {{ $pointage
                    ->heures_normales }}

                heures

            </p>

        </div>

        <div class="info-card">

            <strong>Retard</strong>

            <p>

                {{ $pointage
                    ->retard_minutes }}

                minutes

            </p>

        </div>

        <div class="info-card">

            <strong>Panier</strong>

            <p>

                {{ number_format(
                    $pointage->panier,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

    </div>

    <br><br>

    <!-- HEURES SUPP -->

    <h2 class="section-title">

        Heures Supplémentaires

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>HS +10%</strong>

            <p>

                {{ $pointage
                    ->heures_supp_10 }}

                heures

            </p>

        </div>

        <div class="info-card">

            <strong>HS +30%</strong>

            <p>

                {{ $pointage
                    ->heures_supp_30 }}

                heures

            </p>

        </div>

        <div class="info-card">

            <strong>HS +40%</strong>

            <p>

                {{ $pointage
                    ->heures_supp_40 }}

                heures

            </p>

        </div>

        <div class="info-card">

            <strong>HS +70%</strong>

            <p>

                {{ $pointage
                    ->heures_supp_70 }}

                heures

            </p>

        </div>

    </div>

    <br><br>

    <!-- OBSERVATIONS -->

    <h2 class="section-title">

        Observations

    </h2>

    <div class="info-card">

        <p>

            {{ $pointage->observation
                ?? 'Aucune observation' }}

        </p>

    </div>

    <br><br>

    <!-- ACTIONS -->

    <div style="
        display:flex;
        gap:15px;
        flex-wrap:wrap;
    ">

        <a href="{{ route(
            'pointages.edit',
            $pointage->id
        ) }}"

           class="save-btn"

           style="
                text-decoration:none;
                display:inline-block;
           ">

            Modifier Pointage

        </a>

        <a href="{{ route(
            'pointages.index'
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
