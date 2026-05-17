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

            Contrats Employés

        </h1>

        <p style="
            color:#64748b;
            margin-top:5px;
        ">

            Gestion des contrats RH

        </p>

    </div>

    <a href="{{ route('contrats.create') }}"

       class="btn btn-primary">

        + Nouveau Contrat

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

<div class="box">

    <table>

        <thead>

            <tr>

                <th>
                    Employé
                </th>

                <th>
                    Poste
                </th>

                <th>
                    Catégorie
                </th>

                <th>
                    Type
                </th>

                <th>
                    Salaire
                </th>

                <th>
                    Début
                </th>

                <th>
                    Statut
                </th>

                <th>
                    Actions
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($contrats as $contrat)

                <tr>

                    <td>

                        <strong>

                            {{ $contrat->employe->nom ?? '' }}

                            {{ $contrat->employe->prenom ?? '' }}

                        </strong>

                    </td>

                    <td>

                        {{ $contrat->poste->nom ?? '' }}

                    </td>

                    <td>

                        {{ $contrat->categorie->nom ?? '' }}

                    </td>

                    <td>

                        @if($contrat->type_contrat == 'CDI')

                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                            ">

                                CDI

                            </span>

                        @elseif($contrat->type_contrat == 'CDD')

                            <span style="
                                background:#fef3c7;
                                color:#92400e;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                            ">

                                CDD

                            </span>

                        @else

                            <span style="
                                background:#dbeafe;
                                color:#1d4ed8;
                                padding:6px 12px;
                                border-radius:20px;
                                font-size:13px;
                            ">

                                Journalier

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ number_format(
                            $contrat->salaire_base,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <td>

                        {{ $contrat->date_debut }}

                    </td>

                    <td>

                        @if($contrat->statut == 'actif')

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

                                Terminé

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route(
                            'contrats.edit',
                            $contrat->id
                        ) }}"

                           class="btn btn-warning">

                            Modifier

                        </a>

                        <form action="{{ route(
                                'contrats.destroy',
                                $contrat->id
                            ) }}"

                              method="POST"

                              style="display:inline;">

                            @csrf

                            @method('DELETE')

                            <button type="submit"

                                    class="btn btn-danger"

                                    onclick="
                                        return confirm(
                                            'Supprimer contrat ?'
                                        )
                                    ">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"

                        style="
                            text-align:center;
                            padding:30px;
                        ">

                        Aucun contrat trouvé

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
