@extends('layouts.app')

@section('content')

<div class="profile-card">

    <!-- HEADER -->

    <div class="profile-header">

        <div class="profile-avatar">

            💰

        </div>

        <div>

            <h1 class="profile-name">

                {{ $rubrique->libelle }}

            </h1>

            <p class="profile-poste">

                Code :
                {{ $rubrique->code }}

            </p>

            @if($rubrique->type == 'gain')

                <span class="profile-badge">

                    Gain

                </span>

            @else

                <span style="
                    background:#fee2e2;
                    color:#991b1b;
                    padding:10px 18px;
                    border-radius:30px;
                    font-size:14px;
                    font-weight:700;
                    display:inline-block;
                    margin-top:15px;
                ">

                    Retenue

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

            <strong>Code</strong>

            <p>

                {{ $rubrique->code }}

            </p>

        </div>

        <div class="info-card">

            <strong>Libellé</strong>

            <p>

                {{ $rubrique->libelle }}

            </p>

        </div>

        <div class="info-card">

            <strong>Type</strong>

            <p>

                {{ ucfirst(
                    $rubrique->type
                ) }}

            </p>

        </div>

        <div class="info-card">

            <strong>Base Calcul</strong>

            <p>

                {{ $rubrique->base_calcul }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- PARAMETRES -->

    <h2 class="section-title">

        Paramètres de Calcul

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Taux</strong>

            <p>

                {{ $rubrique->taux }} %

            </p>

        </div>

        <div class="info-card">

            <strong>Montant</strong>

            <p>

                {{ number_format(
                    $rubrique->montant,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

    </div>

    <br><br>

    <!-- REGLES -->

    <h2 class="section-title">

        Règles de Paie

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Imposable IRPP</strong>

            <p>

                @if(
                    $rubrique
                    ->est_imposable_irpp
                )

                    ✅ Oui

                @else

                    ❌ Non

                @endif

            </p>

        </div>

        <div class="info-card">

            <strong>Cotisable CNSS</strong>

            <p>

                @if(
                    $rubrique
                    ->est_cotisable_cnss
                )

                    ✅ Oui

                @else

                    ❌ Non

                @endif

            </p>

        </div>

        <div class="info-card">

            <strong>Cotisable CNAMGS</strong>

            <p>

                @if(
                    $rubrique
                    ->est_cotisable_cnamgs
                )

                    ✅ Oui

                @else

                    ❌ Non

                @endif

            </p>

        </div>

        <div class="info-card">

            <strong>Statut</strong>

            <p>

                @if($rubrique->actif)

                    ✅ Active

                @else

                    ❌ Inactive

                @endif

            </p>

        </div>

    </div>

    <br><br>

    <!-- COMPTABILITE -->

    <h2 class="section-title">

        Comptabilité SYSCOHADA

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Compte Débit</strong>

            <p>

                {{ $rubrique
                    ->compte_comptable_debit }}

            </p>

        </div>

        <div class="info-card">

            <strong>Compte Crédit</strong>

            <p>

                {{ $rubrique
                    ->compte_comptable_credit }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- DESCRIPTION -->

    <h2 class="section-title">

        Description

    </h2>

    <div class="info-card">

        <p>

            {{ $rubrique->description
                ?? 'Aucune description' }}

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
            'rubriques.edit',
            $rubrique->id
        ) }}"

           class="save-btn"

           style="
                text-decoration:none;
                display:inline-block;
           ">

            Modifier Rubrique

        </a>

        <a href="{{ route(
            'rubriques.index'
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
