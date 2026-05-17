@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Bulletins de Paie
        </h1>

        <p>
            Gestion des bulletins et calculs salariaux
        </p>

    </div>

    <a href="{{ route(
            'bulletins.create'
        ) }}"

       class="save-btn"

       style="
            text-decoration:none;
       ">

        + Générer Bulletin

    </a>

</div>

@if(session('success'))

    <div style="
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:14px;
        margin-bottom:20px;
        font-weight:600;
    ">

        {{ session('success') }}

    </div>

@endif

<div class="form-container"
     style="
        overflow-x:auto;
        background:white;
        border-radius:20px;
        padding:20px;
        box-shadow:0 10px 30px rgba(0,0,0,0.05);
     ">

    <table style="
        width:100%;
        border-collapse:collapse;
    ">

        <thead>

            <tr style="
                background:#2563eb;
                color:white;
            ">

                <th style="padding:16px;">
                    Employé
                </th>

                <th style="padding:16px;">
                    Période
                </th>

                <th style="padding:16px;">
                    Salaire Base
                </th>

                <th style="padding:16px;">
                    Brut
                </th>

                <th style="padding:16px;">
                    Retenues
                </th>

                <th style="padding:16px;">
                    Net à Payer
                </th>

                <th style="padding:16px;">
                    Statut
                </th>

                <th style="padding:16px;">
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($bulletins as $bulletin)

                <tr style="
                    border-bottom:1px solid #e2e8f0;
                ">

                    <!-- EMPLOYE -->

                    <td style="padding:18px;">

                        <strong style="
                            color:#0f172a;
                            font-size:15px;
                        ">

                            {{ $bulletin->employe->nom }}

                            {{ $bulletin->employe->prenom }}

                        </strong>

                    </td>

                    <!-- PERIODE -->

                    <td style="padding:18px;">

                        {{ $bulletin
                            ->periodePaie->mois }}

                        {{ $bulletin
                            ->periodePaie->annee }}

                    </td>

                    <!-- SALAIRE BASE -->

                    <td style="padding:18px;">

                        {{ number_format(
                            $bulletin->salaire_base,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <!-- BRUT -->

                    <td style="padding:18px;">

                        {{ number_format(
                            $bulletin->brut,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <!-- RETENUES -->

                    <td style="
                        padding:18px;
                        color:#dc2626;
                        font-weight:700;
                    ">

                        {{ number_format(
                            $bulletin->total_retenues,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <!-- NET -->

                    <td style="padding:18px;">

                        <strong style="
                            color:#16a34a;
                            font-size:16px;
                        ">

                            {{ number_format(
                                $bulletin->net_a_payer,
                                0,
                                ',',
                                ' '
                            ) }}

                            FCFA

                        </strong>

                    </td>

                    <!-- STATUT -->

                    <td style="padding:18px;">

                        @if(
                            $bulletin->statut
                            == 'brouillon'
                        )

                            <span style="
                                background:#fef3c7;
                                color:#92400e;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Brouillon

                            </span>

                        @elseif(
                            $bulletin->statut
                            == 'valide'
                        )

                            <span style="
                                background:#dbeafe;
                                color:#1d4ed8;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Validé

                            </span>

                        @else

                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Payé

                            </span>

                        @endif

                    </td>

                    <!-- ACTIONS -->

                    <td style="padding:18px;">

                        <div style="
                            display:flex;
                            gap:10px;
                            flex-wrap:wrap;
                            align-items:center;
                        ">

                            <!-- VOIR -->

                            <a href="{{ route(
                                'bulletins.show',
                                $bulletin->id
                            ) }}"

                               style="
                                    background:#2563eb;
                                    color:white;
                                    padding:10px 16px;
                                    border-radius:10px;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:700;
                               ">

                                👁 Voir

                            </a>

                            <!-- MODIFIER -->

                            <a href="{{ route(
                                'bulletins.edit',
                                $bulletin->id
                            ) }}"

                               style="
                                    background:#f59e0b;
                                    color:white;
                                    padding:10px 16px;
                                    border-radius:10px;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:700;
                               ">

                                ✏ Modifier

                            </a>

                            <!-- PDF -->

                            <a href="{{ route(
                                    'bulletins.pdf',
                                    $bulletin->id
                                ) }}"

                               target="_blank"

                               style="
                                    background:#dc2626;
                                    color:white;
                                    padding:10px 16px;
                                    border-radius:10px;
                                    text-decoration:none;
                                    font-size:14px;
                                    font-weight:700;
                                    display:inline-flex;
                                    align-items:center;
                                    gap:8px;
                               ">

                                📄 PDF

                            </a>

                            <!-- SUPPRIMER -->

                            <form action="{{ route(
                                    'bulletins.destroy',
                                    $bulletin->id
                                ) }}"

                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"

                                        style="
                                            background:#7f1d1d;
                                            color:white;
                                            border:none;
                                            padding:10px 16px;
                                            border-radius:10px;
                                            cursor:pointer;
                                            font-size:14px;
                                            font-weight:700;
                                        "

                                        onclick="
                                            return confirm(
                                                'Supprimer ce bulletin ?'
                                            )
                                        ">

                                    🗑 Supprimer

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        style="
                            text-align:center;
                            padding:50px;
                            color:#64748b;
                            font-size:16px;
                        ">

                        Aucun bulletin trouvé

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@include('employes.styles')

@endsection
