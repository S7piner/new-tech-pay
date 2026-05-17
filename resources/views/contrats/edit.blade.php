@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <h1>
        Modifier Contrat
    </h1>

    <br>

    <form action="{{ route(
            'contrats.update',
            $contrat->id
        ) }}"

          method="POST">

        @csrf

        @method('PUT')

        <div class="box">

            <div style="margin-bottom:20px;">

                <label>
                    Employé
                </label>

                <br><br>

                <select name="employe_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    @foreach($employes as $employe)

                        <option value="{{ $employe->id }}"

                            {{ $contrat->employe_id == $employe->id
                                ? 'selected'
                                : '' }}>

                            {{ $employe->nom }}
                            {{ $employe->prenom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Poste
                </label>

                <br><br>

                <select name="poste_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    @foreach($postes as $poste)

                        <option value="{{ $poste->id }}"

                            {{ $contrat->poste_id == $poste->id
                                ? 'selected'
                                : '' }}>

                            {{ $poste->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Catégorie
                </label>

                <br><br>

                <select name="categorie_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    @foreach($categories as $categorie)

                        <option value="{{ $categorie->id }}"

                            {{ $contrat->categorie_id == $categorie->id
                                ? 'selected'
                                : '' }}>

                            {{ $categorie->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Type contrat
                </label>

                <br><br>

                <select name="type_contrat"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="CDI"

                        {{ $contrat->type_contrat == 'CDI'
                            ? 'selected'
                            : '' }}>

                        CDI

                    </option>

                    <option value="CDD"

                        {{ $contrat->type_contrat == 'CDD'
                            ? 'selected'
                            : '' }}>

                        CDD

                    </option>

                    <option value="Journalier"

                        {{ $contrat->type_contrat == 'Journalier'
                            ? 'selected'
                            : '' }}>

                        Journalier

                    </option>

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Salaire base
                </label>

                <br><br>

                <input type="number"

                       name="salaire_base"

                       value="{{ $contrat->salaire_base }}"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Date début
                </label>

                <br><br>

                <input type="date"

                       name="date_debut"

                       value="{{ $contrat->date_debut }}"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Date fin
                </label>

                <br><br>

                <input type="date"

                       name="date_fin"

                       value="{{ $contrat->date_fin }}"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Statut
                </label>

                <br><br>

                <select name="statut"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="actif"

                        {{ $contrat->statut == 'actif'
                            ? 'selected'
                            : '' }}>

                        Actif

                    </option>

                    <option value="termine"

                        {{ $contrat->statut == 'termine'
                            ? 'selected'
                            : '' }}>

                        Terminé

                    </option>

                </select>

            </div>

            <button type="submit"

                    class="btn btn-primary">

                Modifier Contrat

            </button>

        </div>

    </form>

</div>

@endsection
