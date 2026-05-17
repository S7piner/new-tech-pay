@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <h1>
        Modifier Catégorie
    </h1>

    <br>

    @if ($errors->any())

        <div style="
            background:#fee2e2;
            color:#991b1b;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        ">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route(
            'categories.update',
            $categorie->id
        ) }}"

          method="POST">

        @csrf

        @method('PUT')

        <div style="
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.05);
        ">

            <div style="margin-bottom:20px;">

                <label>
                    Nom catégorie
                </label>

                <br><br>

                <input type="text"

                       name="nom"

                       value="{{ $categorie->nom }}"

                       style="
                           width:100%;
                           padding:15px;
                           border:1px solid #ddd;
                           border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Salaire minimum
                </label>

                <br><br>

                <input type="number"

                       name="salaire_min"

                       value="{{ $categorie->salaire_min }}"

                       style="
                           width:100%;
                           padding:15px;
                           border:1px solid #ddd;
                           border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Salaire maximum
                </label>

                <br><br>

                <input type="number"

                       name="salaire_max"

                       value="{{ $categorie->salaire_max }}"

                       style="
                           width:100%;
                           padding:15px;
                           border:1px solid #ddd;
                           border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Description
                </label>

                <br><br>

                <textarea

                    name="description"

                    style="
                        width:100%;
                        height:120px;
                        padding:15px;
                        border:1px solid #ddd;
                        border-radius:10px;
                    "
                >{{ $categorie->description }}</textarea>

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
                            border:1px solid #ddd;
                            border-radius:10px;
                        ">

                    <option value="1"

                        {{ $categorie->statut ? 'selected' : '' }}>

                        Actif

                    </option>

                    <option value="0"

                        {{ !$categorie->statut ? 'selected' : '' }}>

                        Inactif

                    </option>

                </select>

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

                Modifier Catégorie

            </button>

        </div>

    </form>

</div>

@endsection
