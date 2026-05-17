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

                Bulletin de Paie

            </h1>

            <p class="profile-poste">

                {{ $bulletin->employe->nom }}

                {{ $bulletin->employe->prenom }}

            </p>

            @if(
                $bulletin->statut
                == 'brouillon'
            )

                <span class="profile-badge">

                    Brouillon

                </span>

            @elseif(
                $bulletin->statut
                == 'valide'
            )

                <span style="
                    background:#dbeafe;
                    color:#1d4ed8;
                    padding:10px 18px;
                    border-radius:30px;
                    font-size:14px;
                    font-weight:700;
                    display:inline-block;
                    margin-top:15px;
                ">

                    Validé

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

                    Payé

                </span>

            @endif

        </div>

    </div>

    <!-- INFOS EMPLOYE -->

    <h2 class="section-title">

        Informations Employé

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Employé</strong>

            <p>

                {{ $bulletin->employe->nom }}

                {{ $bulletin->employe->prenom }}

            </p>

        </div>

        <div class="info-card">

            <strong>Matricule</strong>

            <p>

                {{ $bulletin->employe->matricule }}

            </p>

        </div>

        <div class="info-card">

            <strong>Période</strong>

            <p>

                {{ $bulletin->periodePaie->mois }}

                {{ $bulletin->periodePaie->annee }}

            </p>

        </div>

        <div class="info-card">

            <strong>Statut</strong>

            <p>

                {{ ucfirst(
                    $bulletin->statut
                ) }}

            </p>

        </div>

    </div>

    <br><br>

    <!-- CALCULS -->

    <h2 class="section-title">

        Calculs Salariaux

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>Salaire Base</strong>

            <p>

                {{ number_format(
                    $bulletin->salaire_base,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>Total Gains</strong>

            <p>

                {{ number_format(
                    $bulletin->total_gains,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>Total Retenues</strong>

            <p>

                {{ number_format(
                    $bulletin->total_retenues,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>Brut</strong>

            <p>

                {{ number_format(
                    $bulletin->brut,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>Net à Payer</strong>

            <p style="
                color:#16a34a;
                font-weight:800;
            ">

                {{ number_format(
                    $bulletin->net_a_payer,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

    </div>

    <br><br>

    <!-- COTISATIONS -->

    <h2 class="section-title">

        Cotisations Sociales

    </h2>

    <div class="profile-grid">

        <div class="info-card">

            <strong>CNSS</strong>

            <p>

                {{ number_format(
                    $bulletin->cnss,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>CNAMGS</strong>

            <p>

                {{ number_format(
                    $bulletin->cnamgs,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </p>

        </div>

        <div class="info-card">

            <strong>IRPP</strong>

            <p>

                {{ number_format(
                    $bulletin->irpp,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

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

            {{ $bulletin->observation
                ?? 'Aucune observation' }}

        </p>

    </div>

    <br><br>

    <br><br>

<!-- LIGNES BULLETIN -->

<h2 class="section-title">

    Lignes du Bulletin

</h2>

<div class="form-container"
     style="overflow-x:auto;">

    <table>

        <thead>

            <tr>

                <th>Rubrique</th>

                <th>Type</th>

                <th>Montant</th>

            </tr>

        </thead>

        <tbody>

            @forelse(
                $bulletin->lignes
                as $ligne
            )

                <tr>

                    <!-- LIBELLE -->

                    <td>

                        <strong>

                            {{ $ligne->libelle }}

                        </strong>

                    </td>

                    <!-- TYPE -->

                    <td>

                        @if(
                            $ligne->type
                            == 'gain'
                        )

                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Gain

                            </span>

                        @else

                            <span style="
                                background:#fee2e2;
                                color:#991b1b;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Retenue

                            </span>

                        @endif

                    </td>

                    <!-- MONTANT -->

                    <td>

                        <strong>

                            {{ number_format(
                                $ligne->montant,
                                0,
                                ',',
                                ' '
                            ) }}

                            FCFA

                        </strong>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3"
                        style="
                            text-align:center;
                            padding:30px;
                            color:#64748b;
                        ">

                        Aucune ligne trouvée

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

    <!-- ACTIONS -->

    <div style="
        display:flex;
        gap:15px;
        flex-wrap:wrap;
    ">

        <a href="{{ route(
            'bulletins.edit',
            $bulletin->id
        ) }}"

           class="save-btn"

           style="
                text-decoration:none;
                display:inline-block;
           ">

            Modifier Bulletin

        </a>

        <a href="{{ route(
            'bulletins.index'
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
