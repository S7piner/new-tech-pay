@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Rubriques de Paie
        </h1>

        <p>
            Gestion des gains, retenues et cotisations
        </p>

    </div>

    <a href="{{ route('rubriques.create') }}"
       class="save-btn"
       style="
            text-decoration:none;
       ">

        + Nouvelle Rubrique

    </a>

</div>

@if(session('success'))

    <div style="
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:14px;
        margin-bottom:20px;
    ">

        {{ session('success') }}

    </div>

@endif

<div class="form-container"
     style="overflow-x:auto;">

    <table>

        <thead>

            <tr>

                <th>Code</th>

                <th>Libellé</th>

                <th>Type</th>

                <th>Taux</th>

                <th>Montant</th>

                <th>IRPP</th>

                <th>CNSS</th>

                <th>CNAMGS</th>

                <th>Statut</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($rubriques as $rubrique)

                <tr>

                    <!-- CODE -->

                    <td>

                        <strong>

                            {{ $rubrique->code }}

                        </strong>

                    </td>

                    <!-- LIBELLE -->

                    <td>

                        <a href="{{ route(
                            'rubriques.show',
                            $rubrique->id
                        ) }}"

                           style="
                                text-decoration:none;
                                color:#2563eb;
                                font-weight:700;
                           ">

                            {{ $rubrique->libelle }}

                        </a>

                    </td>

                    <!-- TYPE -->

                    <td>

                        @if(
                            $rubrique->type
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

                    <!-- TAUX -->

                    <td>

                        {{ $rubrique->taux }} %

                    </td>

                    <!-- MONTANT -->

                    <td>

                        {{ number_format(
                            $rubrique->montant,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <!-- IRPP -->

                    <td>

                        @if(
                            $rubrique
                            ->est_imposable_irpp
                        )

                            ✅

                        @else

                            ❌

                        @endif

                    </td>

                    <!-- CNSS -->

                    <td>

                        @if(
                            $rubrique
                            ->est_cotisable_cnss
                        )

                            ✅

                        @else

                            ❌

                        @endif

                    </td>

                    <!-- CNAMGS -->

                    <td>

                        @if(
                            $rubrique
                            ->est_cotisable_cnamgs
                        )

                            ✅

                        @else

                            ❌

                        @endif

                    </td>

                    <!-- STATUT -->

                    <td>

                        @if($rubrique->actif)

                            <span style="
                                background:#dbeafe;
                                color:#1d4ed8;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Active

                            </span>

                        @else

                            <span style="
                                background:#e2e8f0;
                                color:#475569;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Inactive

                            </span>

                        @endif

                    </td>

                    <!-- ACTIONS -->

                    <td>

                        <div style="
                            display:flex;
                            gap:10px;
                        ">

                            <a href="{{ route(
                                'rubriques.show',
                                $rubrique->id
                            ) }}"

                               class="btn btn-primary">

                                Voir

                            </a>

                            <a href="{{ route(
                                'rubriques.edit',
                                $rubrique->id
                            ) }}"

                               class="btn btn-warning">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'rubriques.destroy',
                                    $rubrique->id
                                ) }}"

                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"

                                        class="btn btn-danger"

                                        onclick="
                                            return confirm(
                                                'Supprimer cette rubrique ?'
                                            )
                                        ">

                                    Supprimer

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="10"
                        style="
                            text-align:center;
                            padding:40px;
                            color:#64748b;
                        ">

                        Aucune rubrique trouvée

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@include('employes.styles')

@endsection
