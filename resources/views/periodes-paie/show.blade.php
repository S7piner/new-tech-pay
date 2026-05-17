@extends('layouts.app')

@section('content')

<div class="profile-card">

    <!-- HEADER -->

    <div class="profile-header">

        <div class="profile-avatar">

            📅

        </div>

        <div>

            <h1 class="profile-name">

                {{ $periodePaie->mois }}

                {{ $periodePaie->annee }}

            </h1>

            <p class="profile-poste">

                Gestion de la période de paie

            </p>

            @if(
                $periodePaie->statut
                == 'ouverte'
            )

                <span class="profile-badge">

                    Ouverte

                </span>

            @elseif(
                $periodePaie->statut
                == 'en_validation'
            )

                <span style="
                    background:#fef3c7;
                    color:#92400e;
                    padding:10px 18px;
                    border-radius:30px;
                    font-size:14px;
                    font-weight:700;
                    display:inline-block;
                    margin-top:15px;
                ">

                    En validation

                </span>

            @else

                <span style="
                    background:#dcfce7;
                    color:#166534;
                    padding:10px 18px;
                    border-radius:30px;
                    font-size:14px;
                    font-weight:700;
                    display:inline-block;
                    margin-top:15px;
                ">

                    Clôturée

                </span>

            @endif

        </div>

    </div>

    <!-- INFORMATIONS -->

    <h2 class="section-title">

        Informations Générales

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Mois</strong>

            <p>

                {{ $periodePaie->mois }}

            </p>

        </div>

        <div class="info-card">

            <strong>Année</strong>

            <p>

                {{ $periodePaie->annee }}

            </p>

        </div>

        <div class="info-card">

            <strong>Trimestre</strong>

            <p>

                {{ $periodePaie->trimestre }}

            </p>

        </div>

        <div class="info-card">

            <strong>Statut</strong>

            <p>

                {{ ucfirst(
                    str_replace(
                        '_',
                        ' ',
                        $periodePaie->statut
                    )
                ) }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- DATES -->

    <h2 class="section-title">

        Dates de la Période

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Date Début</strong>

            <p>

                {{ $periodePaie->date_debut }}

            </p>

        </div>

        <div class="info-card">

            <strong>Date Fin</strong>

            <p>

                {{ $periodePaie->date_fin }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- OBSERVATION -->

    <h2 class="section-title">

        Observation

    </h2>

    <div class="info-card">

        <p>

            {{ $periodePaie->observation
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
            'periodes-paie.edit',
            $periodePaie
        ) }}"

           class="save-btn"

           style="
                text-decoration:none;
                display:inline-block;
           ">

            Modifier Période

        </a>

        <a href="{{ route(
            'periodes-paie.index'
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
