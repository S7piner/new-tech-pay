@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Modifier Période de Paie
        </h1>

        <p>
            Gestion et modification de la période
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'periodes-paie.update',
            $periodePaie->id
        ) }}"

          method="POST">

        @csrf
        @method('PUT')

        <!-- INFORMATIONS -->

        <h2 class="section-title">

            Informations Période

        </h2>

        <div class="grid">

            <!-- MOIS -->

            <div class="form-group">

                <label>
                    Mois
                </label>

                <select name="mois">

                    @foreach([
                        'Janvier',
                        'Février',
                        'Mars',
                        'Avril',
                        'Mai',
                        'Juin',
                        'Juillet',
                        'Août',
                        'Septembre',
                        'Octobre',
                        'Novembre',
                        'Décembre'
                    ] as $mois)

                        <option value="{{ $mois }}"

                            {{ $periodePaie->mois
                                == $mois
                                ? 'selected'
                                : '' }}>

                            {{ $mois }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- ANNEE -->

            <div class="form-group">

                <label>
                    Année
                </label>

                <input type="number"
                       name="annee"
                       value="{{ $periodePaie->annee }}">

            </div>

            <!-- TRIMESTRE -->

            <div class="form-group">

                <label>
                    Trimestre
                </label>

                <select name="trimestre">

                    @foreach([
                        'T1',
                        'T2',
                        'T3',
                        'T4'
                    ] as $trimestre)

                        <option value="{{ $trimestre }}"

                            {{ $periodePaie->trimestre
                                == $trimestre
                                ? 'selected'
                                : '' }}>

                            {{ $trimestre }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- STATUT -->

            <div class="form-group">

                <label>
                    Statut
                </label>

                <select name="statut">

                    <option value="ouverte"

                        {{ $periodePaie->statut
                            == 'ouverte'
                            ? 'selected'
                            : '' }}>

                        Ouverte

                    </option>

                    <option value="en_validation"

                        {{ $periodePaie->statut
                            == 'en_validation'
                            ? 'selected'
                            : '' }}>

                        En validation

                    </option>

                    <option value="cloturee"

                        {{ $periodePaie->statut
                            == 'cloturee'
                            ? 'selected'
                            : '' }}>

                        Clôturée

                    </option>

                </select>

            </div>

        </div>

        <!-- DATES -->

        <h2 class="section-title">

            Dates de la Période

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Date Début
                </label>

                <input type="date"
                       name="date_debut"
                       value="{{ $periodePaie->date_debut }}">

            </div>

            <div class="form-group">

                <label>
                    Date Fin
                </label>

                <input type="date"
                       name="date_fin"
                       value="{{ $periodePaie->date_fin }}">

            </div>

        </div>

        <!-- OBSERVATION -->

        <div class="form-group">

            <label>
                Observation
            </label>

            <textarea name="observation">{{ $periodePaie->observation }}</textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Modifier Période

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
