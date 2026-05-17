@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Nouveau Pointage
        </h1>

        <p>
            Gestion des présences et heures supplémentaires
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route('pointages.store') }}"
          method="POST">

        @csrf

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

                    <option value="">
                        Choisir
                    </option>

                    @foreach($employes as $employe)

                        <option value="{{ $employe->id }}">

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
                       name="date">

            </div>

            <!-- STATUT -->

            <div class="form-group">

                <label>
                    Statut
                </label>

                <select name="statut">

                    <option value="présent">
                        Présent
                    </option>

                    <option value="absent">
                        Absent
                    </option>

                    <option value="congé">
                        Congé
                    </option>

                    <option value="repos">
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
                       name="heure_arrivee">

            </div>

            <div class="form-group">

                <label>
                    Heure départ
                </label>

                <input type="time"
                       name="heure_depart">

            </div>

            <div class="form-group">

                <label>
                    Heures normales
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_normales">

            </div>

            <div class="form-group">

                <label>
                    Retard (minutes)
                </label>

                <input type="number"
                       name="retard_minutes"
                       value="0">

            </div>

        </div>

        <!-- HEURES SUPPLEMENTAIRES -->

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
                       value="0">

            </div>

            <div class="form-group">

                <label>
                    HS +30%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_30"
                       value="0">

            </div>

            <div class="form-group">

                <label>
                    HS +40%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_40"
                       value="0">

            </div>

            <div class="form-group">

                <label>
                    HS +70%
                </label>

                <input type="number"
                       step="0.01"
                       name="heures_supp_70"
                       value="0">

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
                       value="0">

            </div>

            <div class="form-group">

                <label>
                    Absence
                </label>

                <select name="absence">

                    <option value="0">
                        Non
                    </option>

                    <option value="1">
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

            <textarea name="observation"></textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Enregistrer Pointage

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
