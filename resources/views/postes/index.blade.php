@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    ">

        <div>

            <h1>
                Postes
            </h1>

            <p>
                Total :
                {{ $postes->count() }}
                postes
            </p>

        </div>

        <a href="{{ route('postes.create') }}"

           style="
                background:#2563eb;
                color:white;
                padding:14px 20px;
                border-radius:10px;
                text-decoration:none;
           ">

            + Ajouter

        </a>

    </div>

    @if(session('success'))

        <div style="
            background:#dcfce7;
            color:#166534;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        ">

            {{ session('success') }}

        </div>

    @endif

    <div style="
        background:white;
        border-radius:15px;
        overflow:hidden;
        box-shadow:0 5px 15px rgba(0,0,0,0.05);
    ">

        <table style="
            width:100%;
            border-collapse:collapse;
        ">

            <thead style="
                background:#f8fafc;
            ">

                <tr>

                    <th style="padding:18px;text-align:left;">
                        Poste
                    </th>

                    <th style="padding:18px;text-align:left;">
                        Salaire Base
                    </th>

                    <th style="padding:18px;text-align:left;">
                        Statut
                    </th>

                    <th style="
                        padding:18px;
                        text-align:center;
                    ">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($postes as $poste)

                    <tr style="
                        border-top:1px solid #eee;
                    ">

                        <td style="padding:18px;">

                            <strong>
                                {{ $poste->nom }}
                            </strong>

                            <br>

                            <small>
                                {{ $poste->description }}
                            </small>

                        </td>

                        <td style="padding:18px;">

                            {{ number_format(
                                $poste->salaire_base,
                                0,
                                ',',
                                ' '
                            ) }}

                            FCFA

                        </td>

                        <td style="padding:18px;">

                            @if($poste->statut)

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

                        <td style="
                            padding:18px;
                            text-align:center;
                        ">

                            <a href="{{ route(
                                'postes.edit',
                                $poste->id
                            ) }}"

                               style="
                                    background:#f59e0b;
                                    color:white;
                                    padding:10px 15px;
                                    border-radius:8px;
                                    text-decoration:none;
                                    margin-right:5px;
                               ">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'postes.destroy',
                                    $poste->id
                                ) }}"

                                  method="POST"

                                  style="display:inline;">

                                @csrf

                                @method('DELETE')

                                <button type="submit"

                                        onclick="
                                            return confirm(
                                                'Supprimer ce poste ?'
                                            )
                                        "

                                        style="
                                            background:#ef4444;
                                            color:white;
                                            padding:10px 15px;
                                            border:none;
                                            border-radius:8px;
                                            cursor:pointer;
                                        ">

                                    Supprimer

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"

                            style="
                                padding:30px;
                                text-align:center;
                            ">

                            Aucun poste trouvé

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
