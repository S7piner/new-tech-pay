@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Modifier Rubrique
        </h1>

        <p>
            Modification des paramètres de paie
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'rubriques.update',
            $rubrique->id
        ) }}"

          method="POST">

        @csrf
        @method('PUT')

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
                       value="{{ $rubrique->code }}">

            </div>

            <!-- LIBELLE -->

            <div class="form-group">

                <label>
                    Libellé
                </label>

                <input type="text"
                       name="libelle"
                       value="{{ $rubrique->libelle }}">

            </div>

            <!-- TYPE -->

            <div class="form-group">

                <label>
                    Type
                </label>

                <select name="type">

                    <option value="gain"

                        {{ $rubrique->type
                            == 'gain'
                            ? 'selected'
                            : '' }}>

                        Gain

                    </option>

                    <option value="retenue"

                        {{ $rubrique->type
                            == 'retenue'
                            ? 'selected'
                            : '' }}>

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
                       value="{{ $rubrique->base_calcul }}">

            </div>

        </div>

        <!-- PARAMETRES -->

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
                       value="{{ $rubrique->taux }}">

            </div>

            <div class="form-group">

                <label>
                    Montant Fixe
                </label>

                <input type="number"
                       step="0.01"
                       name="montant"
                       value="{{ $rubrique->montant }}">

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
                           value="1"

                        {{ $rubrique
                            ->est_imposable_irpp
                            ? 'checked'
                            : '' }}>

                    Imposable IRPP

                </label>

            </div>

            <!-- CNSS -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="est_cotisable_cnss"
                           value="1"

                        {{ $rubrique
                            ->est_cotisable_cnss
                            ? 'checked'
                            : '' }}>

                    Cotisable CNSS

                </label>

            </div>

            <!-- CNAMGS -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="est_cotisable_cnamgs"
                           value="1"

                        {{ $rubrique
                            ->est_cotisable_cnamgs
                            ? 'checked'
                            : '' }}>

                    Cotisable CNAMGS

                </label>

            </div>

            <!-- ACTIF -->

            <div class="form-group">

                <label>

                    <input type="checkbox"
                           name="actif"
                           value="1"

                        {{ $rubrique->actif
                            ? 'checked'
                            : '' }}>

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
                       value="{{ $rubrique->compte_comptable_debit }}">

            </div>

            <div class="form-group">

                <label>
                    Compte Crédit
                </label>

                <input type="text"
                       name="compte_comptable_credit"
                       value="{{ $rubrique->compte_comptable_credit }}">

            </div>

        </div>

        <!-- DESCRIPTION -->

        <div class="form-group">

            <label>
                Description
            </label>

            <textarea name="description">{{ $rubrique->description }}</textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Modifier Rubrique

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
