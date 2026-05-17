@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Modifier Pointage
        </h1>

        <p>
            Modification des informations de présence
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'pointages.update',
            $pointage->id
        ) }}"

          method="POST">

        @csrf
        @method('PUT')

        <!-- INFORMATIONS PRINCIPALES -->

        <h2 class="section-title">

            Informations Générales

        </h2>

        <div class="grid">

            <!-- EMPLOYE -->

            <div class="form-group">

                <label>
                    Employé
                </label>

                <select name="employe_id">

                    @foreach($employes as $employe)

                        <option value="{{ $employe->id }}"

                            {{ $pointage->employe_id
                                == $employe->id
                                ? 'selected'
                                : '' }}>

                            {{ $employe->nom }}

                            {{ $employe->prenom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- DATE -->

            <div class="form-group">

                <label>
                    Date
                </label>

                <input type="date"
                       name="date"
                       value="{{ $pointage->date }}">

            </div>

            <!-- STATUT -->

            <div class="form-group">

                <label>
                    Statut
                </label>

                <select name="statut">

                    <option value="présent"

                        {{ $pointage->statut
                            == 'présent'
                            ? 'selected'
                            : '' }}>

                        Présent

                    </option>

                    <option value="absent"

                        {{ $pointage->statut
                            == 'absent'
                            ? 'selected'
                            : '' }}>

                        Absent

                    </option>

                    <option value="congé"

                        {{ $pointage->statut
                            == 'congé'
                            ? 'selected'
                            : '' }}>

                        Congé

                    </option>

                    <option value="repos"

                        {{ $pointage->statut
                            == 'repos'
                            ? 'selected'
                            : '' }}>

                        Repos

                    </option>

                </select>

            </div>

        </div>

        <!-- HORAIRES -->

        <h2 class="section-title">

            Horaires

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Heure arrivée
                </label>

                <input type="time"
                       name="heure_arrivee"
                       value="{{ $pointage->heure_arrivee }}">

            </div>

            <div class="form-group">

                <label>
                    Heure départ
                </label>

                <input type="time"
                       name="heure_depart"
                       value="{{ $pointage->heure_depart }}">

            </div>

            <div class="form-group">

                <label>
                    Heures normales
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_normales"
                       value="{{ $pointage->heures_normales }}">

            </div>

            <div class="form-group">

                <label>
                    Retard (minutes)
                </label>

                <input type="number"
                       name="retard_minutes"
                       value="{{ $pointage->retard_minutes }}">

            </div>

        </div>

        <!-- HEURES SUPP -->

        <h2 class="section-title">

            Heures Supplémentaires

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    HS +10%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_10"
                       value="{{ $pointage->heures_supp_10 }}">

            </div>

            <div class="form-group">

                <label>
                    HS +30%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_30"
                       value="{{ $pointage->heures_supp_30 }}">

            </div>

            <div class="form-group">

                <label>
                    HS +40%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_40"
                       value="{{ $pointage->heures_supp_40 }}">

            </div>

            <div class="form-group">

                <label>
                    HS +70%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_70"
                       value="{{ $pointage->heures_supp_70 }}">

            </div>

        </div>

        <!-- PRIMES -->

        <h2 class="section-title">

            Primes & Observations

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Panier
                </label>

                <input type="number"
                       name="panier"
                       value="{{ $pointage->panier }}">

            </div>

            <div class="form-group">

                <label>
                    Absence
                </label>

                <select name="absence">

                    <option value="0"

                        {{ $pointage->absence == 0
                            ? 'selected'
                            : '' }}>

                        Non

                    </option>

                    <option value="1"

                        {{ $pointage->absence == 1
                            ? 'selected'
                            : '' }}>

                        Oui

                    </option>

                </select>

            </div>

        </div>

        <!-- OBSERVATION -->

        <div class="form-group">

            <label>
                Observation
            </label>

            <textarea name="observation">{{ $pointage->observation }}</textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Modifier Pointage

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
