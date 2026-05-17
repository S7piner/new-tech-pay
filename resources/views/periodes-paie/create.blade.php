@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Nouvelle Période de Paie
        </h1>

        <p>
            Ouverture d'un nouveau mois de paie
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'periodes-paie.store'
        ) }}"

          method="POST">

        @csrf

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

                    <option value="Janvier">
                        Janvier
                    </option>

                    <option value="Février">
                        Février
                    </option>

                    <option value="Mars">
                        Mars
                    </option>

                    <option value="Avril">
                        Avril
                    </option>

                    <option value="Mai">
                        Mai
                    </option>

                    <option value="Juin">
                        Juin
                    </option>

                    <option value="Juillet">
                        Juillet
                    </option>

                    <option value="Août">
                        Août
                    </option>

                    <option value="Septembre">
                        Septembre
                    </option>

                    <option value="Octobre">
                        Octobre
                    </option>

                    <option value="Novembre">
                        Novembre
                    </option>

                    <option value="Décembre">
                        Décembre
                    </option>

                </select>

            </div>

            <!-- ANNEE -->

            <div class="form-group">

                <label>
                    Année
                </label>

                <input type="number"
                       name="annee"
                       value="{{ date('Y') }}">

            </div>

            <!-- TRIMESTRE -->

            <div class="form-group">

                <label>
                    Trimestre
                </label>

                <select name="trimestre">

                    <option value="T1">
                        T1
                    </option>

                    <option value="T2">
                        T2
                    </option>

                    <option value="T3">
                        T3
                    </option>

                    <option value="T4">
                        T4
                    </option>

                </select>

            </div>

            <!-- STATUT -->

            <div class="form-group">

                <label>
                    Statut
                </label>

                <select name="statut">

                    <option value="ouverte">
                        Ouverte
                    </option>

                    <option value="en_validation">
                        En validation
                    </option>

                    <option value="cloturee">
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
                       name="date_debut">

            </div>

            <div class="form-group">

                <label>
                    Date Fin
                </label>

                <input type="date"
                       name="date_fin">

            </div>

        </div>

        <!-- OBSERVATION -->

        <div class="form-group">

            <label>
                Observation
            </label>

            <textarea name="observation"
                      placeholder="
Commentaires ou remarques...
                      "></textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Enregistrer Période

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
