@extends('layouts.app')

@section('content')

<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
">

    <div>

        <h1 style="
            font-size:30px;
            color:#0f172a;
        ">

            Nouveau Centre de Coût

        </h1>

        <p style="
            color:#64748b;
            margin-top:5px;
        ">

            Ajouter une nouvelle unité organisationnelle

        </p>

    </div>

</div>

<div class="box">

    <form action="{{ route(
            'centres-cout.store'
        ) }}"

          method="POST">

        @csrf

        <div style="
            display:grid;
            grid-template-columns:
            repeat(auto-fit,minmax(300px,1fr));
            gap:20px;
        ">

            <div>

                <label>Nom</label>

                <br><br>

                <input type="text"

                       name="nom"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Code</label>

                <br><br>

                <input type="text"

                       name="code"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Type</label>

                <br><br>

                <select name="type"

                        style="
                            width:100%;
                            padding:15px;
                        ">

                    <option value="">
                        Choisir
                    </option>

                    <option value="Département">
                        Département
                    </option>

                    <option value="Service">
                        Service
                    </option>

                    <option value="Agence">
                        Agence
                    </option>

                    <option value="Projet">
                        Projet
                    </option>

                    <option value="Site">
                        Site
                    </option>

                    <option value="Programme">
                        Programme
                    </option>

                </select>

            </div>

            <div>

                <label>Responsable</label>

                <br><br>

                <input type="text"

                       name="responsable"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Téléphone</label>

                <br><br>

                <input type="text"

                       name="telephone"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Email</label>

                <br><br>

                <input type="email"

                       name="email"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Localisation</label>

                <br><br>

                <input type="text"

                       name="localisation"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Budget</label>

                <br><br>

                <input type="number"

                       name="budget"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div style="
                grid-column:1/-1;
            ">

                <label>Description</label>

                <br><br>

                <textarea name="description"

                          style="
                            width:100%;
                            height:120px;
                            padding:15px;
                          "></textarea>

            </div>

        </div>

        <br>

        <button type="submit"

                class="btn btn-primary">

            Créer Centre

        </button>

    </form>

</div>

@endsection
