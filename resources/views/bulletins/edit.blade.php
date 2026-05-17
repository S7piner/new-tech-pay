@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Modifier Bulletin
        </h1>

        <p>
            Gestion et validation du bulletin de paie
        </p>

    </div>

</div>

<div class="form-container">

    <form action="{{ route(
            'bulletins.update',
            $bulletin->id
        ) }}"

          method="POST">

        @csrf
        @method('PUT')

        <!-- INFORMATIONS -->

        <h2 class="section-title">

            Informations Bulletin

        </h2>

        <div class="grid">

            <!-- EMPLOYE -->

            <div class="form-group">

                <label>
                    Employé
                </label>

                <input type="text"

                       value="
{{ $bulletin->employe->nom }}
{{ $bulletin->employe->prenom }}
                       "

                       disabled>

            </div>

            <!-- PERIODE -->

            <div class="form-group">

                <label>
                    Période
                </label>

                <input type="text"

                       value="
{{ $bulletin->periodePaie->mois }}
{{ $bulletin->periodePaie->annee }}
                       "

                       disabled>

            </div>

            <!-- SALAIRE -->

            <div class="form-group">

                <label>
                    Salaire Base
                </label>

                <input type="text"

                       value="
{{ number_format(
    $bulletin->salaire_base,
    0,
    ',',
    ' '
) }} FCFA
                       "

                       disabled>

            </div>

            <!-- NET -->

            <div class="form-group">

                <label>
                    Net à Payer
                </label>

                <input type="text"

                       value="
{{ number_format(
    $bulletin->net_a_payer,
    0,
    ',',
    ' '
) }} FCFA
                       "

                       disabled>

            </div>

        </div>

        <!-- STATUT -->

        <h2 class="section-title">

            Workflow Paie

        </h2>

        <div class="grid">

            <div class="form-group">

                <label>
                    Statut
                </label>

                <select name="statut">

                    <option value="brouillon"

                        {{ $bulletin->statut
                            == 'brouillon'
                            ? 'selected'
                            : '' }}>

                        Brouillon

                    </option>

                    <option value="valide"

                        {{ $bulletin->statut
                            == 'valide'
                            ? 'selected'
                            : '' }}>

                        Validé

                    </option>

                    <option value="paye"

                        {{ $bulletin->statut
                            == 'paye'
                            ? 'selected'
                            : '' }}>

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

            <textarea name="observation">{{ $bulletin->observation }}</textarea>

        </div>

        <br>

        <button type="submit"
                class="save-btn">

            Modifier Bulletin

        </button>

    </form>

</div>

@include('employes.styles')

@endsection
