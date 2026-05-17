@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Périodes de Paie
        </h1>

        <p>
            Gestion des périodes mensuelles de paie
        </p>

    </div>

    <a href="{{ route(
            'periodes-paie.create'
        ) }}"

       class="save-btn"

       style="
            text-decoration:none;
       ">

        + Nouvelle Période

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

                <th>Période</th>

                <th>Trimestre</th>

                <th>Date Début</th>

                <th>Date Fin</th>

                <th>Statut</th>

                <th>Observation</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($periodes as $periode)

                <tr>

                    <!-- PERIODE -->

                    <td>

                        <strong>

                            {{ $periode->mois }}

                            {{ $periode->annee }}

                        </strong>

                    </td>

                    <!-- TRIMESTRE -->

                    <td>

                        {{ $periode->trimestre }}

                    </td>

                    <!-- DATE DEBUT -->

                    <td>

                        {{ $periode->date_debut }}

                    </td>

                    <!-- DATE FIN -->

                    <td>

                        {{ $periode->date_fin }}

                    </td>

                    <!-- STATUT -->

                    <td>

                        @if(
                            $periode->statut
                            == 'ouverte'
                        )

                            <span style="
                                background:#dbeafe;
                                color:#1d4ed8;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Ouverte

                            </span>

                        @elseif(
                            $periode->statut
                            == 'en_validation'
                        )

                            <span style="
                                background:#fef3c7;
                                color:#92400e;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Validation

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

                                Clôturée

                            </span>

                        @endif

                    </td>

                    <!-- OBSERVATION -->

                    <td>

                        {{ $periode->observation
                            ?? '—' }}

                    </td>

                    <!-- ACTIONS -->

                    <td>

                        <div style="
                            display:flex;
                            gap:10px;
                            flex-wrap:wrap;
                        ">

                            <a href="{{ route(
                                'periodes-paie.show',
                                $periode->id
                            ) }}"

                               class="btn btn-primary">

                                Voir

                            </a>

                            <a href="{{ route(
                                'periodes-paie.edit',
                                $periode->id
                            ) }}"

                               class="btn btn-warning">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'periodes-paie.destroy',
                                    $periode->id
                                ) }}"

                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"

                                        class="btn btn-danger"

                                        onclick="
                                            return confirm(
                                                'Supprimer cette période ?'
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

                    <td colspan="7"
                        style="
                            text-align:center;
                            padding:40px;
                            color:#64748b;
                        ">

                        Aucune période trouvée

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@include('employes.styles')

@endsection
