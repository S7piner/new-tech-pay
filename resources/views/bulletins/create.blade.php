@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Générer Bulletin
        </h1>

        <p>
            Génération automatique du bulletin de paie
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'bulletins.store'
        ) }}"

          method="POST">

        @csrf

        <!-- EMPLOYE -->

        <h2 class="section-title">

            Informations Employé

        </h2>

        <div class="grid">

            <!-- EMPLOYE -->

            <div class="form-group">

                <label>
                    Employé
                </label>

                <select name="employe_id">

                    @foreach($employes as $employe)

                        <option value="{{ $employe->id }}">

                            {{ $employe->nom }}

                            {{ $employe->prenom }}

                            -
                            {{ $employe->matricule }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- PERIODE -->

            <div class="form-group">

                <label>
                    Période Paie
                </label>

                <select name="periode_paie_id">

                    @foreach($periodes as $periode)

                        <option value="{{ $periode->id }}">

                            {{ $periode->mois }}

                            {{ $periode->annee }}

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

                    <option value="brouillon">
                        Brouillon
                    </option>

                    <option value="valide">
                        Validé
                    </option>

                    <option value="paye">
                        Payé
                    </option>

                </select>

            </div>

        </div>

        <!-- OBSERVATION -->

        <div class="form-group">

            <label>
                Observation
            </label>

            <textarea name="observation"
                      placeholder="
Commentaires sur le bulletin...
                      "></textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Générer Bulletin

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
