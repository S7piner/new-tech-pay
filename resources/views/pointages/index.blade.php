@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Pointages
        </h1>

        <p>
            Gestion des présences des employés
        </p>

    </div>

    <a href="{{ route('pointages.create') }}"
       class="save-btn"
       style="
            text-decoration:none;
       ">

        + Nouveau Pointage

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

                <th>Employé</th>

                <th>Date</th>

                <th>Arrivée</th>

                <th>Départ</th>

                <th>Heures</th>

                <th>HS</th>

                <th>Retard</th>

                <th>Panier</th>

                <th>Statut</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($pointages as $pointage)

                <tr>

                    <!-- EMPLOYE -->

                    <td>

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:12px;
                        ">

                            @if(
                                $pointage->employe->photo
                            )

                                <img src="{{ asset(
                                    'storage/'.
                                    $pointage->employe->photo
                                ) }}"

                                     width="50"

                                     height="50"

                                     style="
                                        border-radius:50%;
                                        object-fit:cover;
                                     ">

                            @else

                                <div style="
                                    width:50px;
                                    height:50px;
                                    border-radius:50%;
                                    background:#2563eb;
                                    color:white;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-weight:bold;
                                ">

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

                                <strong>

                                    {{ $pointage
                                        ->employe
                                        ->nom }}

                                    {{ $pointage
                                        ->employe
                                        ->prenom }}

                                </strong>

                                <br>

                                <small style="
                                    color:#64748b;
                                ">

                                    {{ $pointage
                                        ->employe
                                        ->poste
                                        ->nom ?? '' }}

                                </small>

                            </div>

                        </div>

                    </td>

                    <!-- DATE -->

                    <td>

                        {{ $pointage->date }}

                    </td>

                    <!-- ARRIVEE -->

                    <td>

                        {{ $pointage->heure_arrivee }}

                    </td>

                    <!-- DEPART -->

                    <td>

                        {{ $pointage->heure_depart }}

                    </td>

                    <!-- HEURES -->

                    <td>

                        <strong>

                            {{ $pointage
                                ->heures_normales }}

                            h

                        </strong>

                    </td>

                    <!-- HS -->

                    <td>

                        <div style="
                            font-size:13px;
                            line-height:1.7;
                        ">

                            +10 :
                            {{ $pointage
                                ->heures_supp_10 }}h

                            <br>

                            +30 :
                            {{ $pointage
                                ->heures_supp_30 }}h

                            <br>

                            +40 :
                            {{ $pointage
                                ->heures_supp_40 }}h

                            <br>

                            +70 :
                            {{ $pointage
                                ->heures_supp_70 }}h

                        </div>

                    </td>

                    <!-- RETARD -->

                    <td>

                        @if(
                            $pointage
                            ->retard_minutes > 0
                        )

                            <span style="
                                background:#fee2e2;
                                color:#991b1b;
                                padding:8px 12px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                {{ $pointage
                                    ->retard_minutes }}

                                min

                            </span>

                        @else

                            —

                        @endif

                    </td>

                    <!-- PANIER -->

                    <td>

                        {{ number_format(
                            $pointage->panier,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                    <!-- STATUT -->

                    <td>

                        @if(
                            $pointage->statut
                            == 'présent'
                        )

                            <span style="
                                background:#dcfce7;
                                color:#166534;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Présent

                            </span>

                        @elseif(
                            $pointage->statut
                            == 'absent'
                        )

                            <span style="
                                background:#fee2e2;
                                color:#991b1b;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                Absent

                            </span>

                        @else

                            <span style="
                                background:#fef3c7;
                                color:#92400e;
                                padding:8px 14px;
                                border-radius:30px;
                                font-size:13px;
                                font-weight:700;
                            ">

                                {{ $pointage
                                    ->statut }}

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
                                'pointages.show',
                                $pointage->id
                            ) }}"

                               class="btn btn-primary">

                                Voir

                            </a>

                            <a href="{{ route(
                                'pointages.edit',
                                $pointage->id
                            ) }}"

                               class="btn btn-warning">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'pointages.destroy',
                                    $pointage->id
                                ) }}"

                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"

                                        class="btn btn-danger"

                                        onclick="
                                            return confirm(
                                                'Supprimer ce pointage ?'
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

                        Aucun pointage trouvé

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@include('employes.styles')

@endsection
