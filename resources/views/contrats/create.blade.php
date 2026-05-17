@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <h1>
        Nouveau Contrat
    </h1>

    <br>

    <form action="{{ route('contrats.store') }}"
          method="POST">

        @csrf

        <div style="
            background:white;
            padding:30px;
            border-radius:15px;
        ">

            <div style="margin-bottom:20px;">

                <label>Employé</label>

                <br><br>

                <select name="employe_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="">
                        Choisir employé
                    </option>

                    @foreach($employes as $employe)

                        <option value="{{ $employe->id }}">

                            {{ $employe->nom }}
                            {{ $employe->prenom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>Poste</label>

                <br><br>

                <select name="poste_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="">
                        Choisir poste
                    </option>

                    @foreach($postes as $poste)

                        <option value="{{ $poste->id }}">

                            {{ $poste->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>Catégorie</label>

                <br><br>

                <select name="categorie_id"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="">
                        Choisir catégorie
                    </option>

                    @foreach($categories as $categorie)

                        <option value="{{ $categorie->id }}">

                            {{ $categorie->nom }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>Type contrat</label>

                <br><br>

                <select name="type_contrat"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="CDI">
                        CDI
                    </option>

                    <option value="CDD">
                        CDD
                    </option>

                    <option value="Journalier">
                        Journalier
                    </option>

                </select>

            </div>

            <div style="margin-bottom:20px;">

                <label>Salaire base</label>

                <br><br>

                <input type="number"

                       name="salaire_base"

                       style="
                            width:100%;
                            padding:15px;
                            border:1px solid #ddd;
                            border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>Date début</label>

                <br><br>

                <input type="date"

                       name="date_debut"

                       style="
                            width:100%;
                            padding:15px;
                            border:1px solid #ddd;
                            border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>Date fin</label>

                <br><br>

                <input type="date"

                       name="date_fin"

                       style="
                            width:100%;
                            padding:15px;
                            border:1px solid #ddd;
                            border-radius:10px;
                       ">

            </div>

            <button type="submit"

                    style="
                        background:#2563eb;
                        color:white;
                        border:none;
                        padding:15px 25px;
                        border-radius:10px;
                        cursor:pointer;
                    ">

                Créer Contrat

            </button>

        </div>

    </form>

</div>

@endsection
