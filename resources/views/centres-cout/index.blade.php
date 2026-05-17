@extends('layouts.app')

@section('content')

<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:20px;
">

    <div>

        <h1 style="
            font-size:30px;
            color:#0f172a;
        ">

            Centres de Coût

        </h1>

        <p style="
            color:#64748b;
            margin-top:5px;
        ">

            Gestion des unités organisationnelles

        </p>

    </div>

    <a href="{{ route(
            'centres-cout.create'
        ) }}"

       class="btn btn-primary">

        + Nouveau Centre

    </a>

</div>

@if(session('success'))

    <div style="
        background:#dcfce7;
        color:#166534;
        padding:15px;
        border-radius:12px;
        margin-bottom:20px;
    ">

        {{ session('success') }}

    </div>

@endif

<div class="box" style="overflow-x:auto;">

    <table>

        <thead>

            <tr>

                <th>Nom</th>

                <th>Code</th>

                <th>Type</th>

                <th>Responsable</th>

                <th>Téléphone</th>

                <th>Email</th>

                <th>Localisation</th>

                <th>Budget</th>

                <th>Employés</th>

                <th>Statut</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($centres as $centre)

                <tr>

                    <!-- NOM -->

                    <td>

                        <strong>

                            {{ $centre->nom }}

                        </strong>

                    </td>

                    <!-- CODE -->

                    <td>

                        {{ $centre->code }}

                    </td>

                    <!-- TYPE -->

                    <td>

                        <span style="
                            background:#dbeafe;
                            color:#1d4ed8;
                            padding:6px 12px;
                            border-radius:20px;
                            font-size:13px;
                        ">

                            {{ $centre->type }}

                        </span>

                    </td>

                    <!-- RESPONSABLE -->

                    <td>

                        {{ $centre->responsable }}

                    </td>

                    <!-- TELEPHONE -->

                    <td>

                        {{ $centre->telephone }}

                    </td>

                    <!-- EMAIL -->

                    <td>

                        {{ $centre->email }}

                    </td>

                    <!-- LOCALISATION -->

                    <td>

                        {{ $centre->localisation }}

                    </td>

                    <!-- BUDGET -->

                    <td>

                        <strong>

                            {{ number_format(
                                $centre->budget,
                                0,
                                ',',
                                ' '
                            ) }}

                            FCFA

                        </strong>

                    </td>

                    <!-- EMPLOYES -->

                    <td>

                        <span style="
                            background:#dcfce7;
                            color:#166534;
                            padding:6px 12px;
                            border-radius:20px;
                            font-size:13px;
                        ">

                            {{ $centre->employes->count() }}

                        </span>

                    </td>

                    <!-- STATUT -->

                    <td>

                        @if($centre->statut == 'actif')

                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                            ">

                                Actif

                            </span>

                        @else

                            <span style="
                                background:#fee2e2;
                                color:#991b1b;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                            ">

                                Inactif

                            </span>

                        @endif

                    </td>

                    <!-- ACTIONS -->

                    <td>

                        <div style="
                            display:flex;
                            gap:8px;
                            flex-wrap:wrap;
                        ">

                            <a href="{{ route(
                                'centres-cout.edit',
                                $centre->id
                            ) }}"

                               class="btn btn-warning">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'centres-cout.destroy',
                                    $centre->id
                                ) }}"

                                  method="POST">

                                @csrf

                                @method('DELETE')

                                <button type="submit"

                                        class="btn btn-danger"

                                        onclick="
                                            return confirm(
                                                'Supprimer ce centre ?'
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

                    <td colspan="11"

                        style="
                            text-align:center;
                            padding:40px;
                            color:#64748b;
                        ">

                        Aucun centre trouvé

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
