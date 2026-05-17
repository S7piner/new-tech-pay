@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Nouvelle Rubrique
        </h1>

        <p>
            Création des lignes de paie et cotisations
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route('rubriques.store') }}"
          method="POST">

        @csrf

        <!-- INFORMATIONS -->

        <h2 class="section-title">

            Informations Générales

        </h2>

        <div class="grid">

            <!-- CODE -->

            <div class="form-group">

                <label>
                    Code
                </label>

                <input type="text"
                       name="code"
                       placeholder="SALB">

            </div>

            <!-- LIBELLE -->

            <div class="form-group">

                <label>
                    Libellé
                </label>

                <input type="text"
                       name="libelle"
                       placeholder="Salaire de base">

            </div>

            <!-- TYPE -->

            <div class="form-group">

                <label>
                    Type
                </label>

                <select name="type">

                    <option value="gain">
                        Gain
                    </option>

                    <option value="retenue">
                        Retenue
                    </option>

                </select>

            </div>

            <!-- BASE -->

            <div class="form-group">

                <label>
                    Base Calcul
                </label>

                <input type="text"
                       name="base_calcul"
                       placeholder="Salaire brut">

            </div>

        </div>

        <!-- CALCUL -->

        <h2 class="section-title">

            Paramètres de Calcul

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Taux (%)
                </label>

                <input type="number"
                       step="0.01"
                       name="taux"
                       value="0">

            </div>

            <div class="form-group">

                <label>
                    Montant Fixe
                </label>

                <input type="number"
                       step="0.01"
                       name="montant"
                       value="0">

            </div>

        </div>

        <!-- REGLES -->

        <h2 class="section-title">

            Règles de Paie

        </h2>

        <div class="grid">

            <!-- IRPP -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="est_imposable_irpp"
                           value="1">

                    Imposable IRPP

                </label>

            </div>

            <!-- CNSS -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="est_cotisable_cnss"
                           value="1">

                    Cotisable CNSS

                </label>

            </div>

            <!-- CNAMGS -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="est_cotisable_cnamgs"
                           value="1">

                    Cotisable CNAMGS

                </label>

            </div>

            <!-- ACTIF -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="actif"
                           value="1"
                           checked>

                    Rubrique active

                </label>

            </div>

        </div>

        <!-- COMPTABILITE -->

        <h2 class="section-title">

            Comptabilité SYSCOHADA

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Compte Débit
                </label>

                <input type="text"
                       name="compte_comptable_debit"
                       placeholder="641100">

            </div>

            <div class="form-group">

                <label>
                    Compte Crédit
                </label>

                <input type="text"
                       name="compte_comptable_credit"
                       placeholder="421000">

            </div>

        </div>

        <!-- DESCRIPTION -->

        <div class="form-group">

            <label>
                Description
            </label>

            <textarea name="description"></textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Enregistrer Rubrique

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
