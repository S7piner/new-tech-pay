@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <h1>
        Modifier Poste
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
            'postes.update',
            $poste->id
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
                    Nom poste
                </label>

                <br><br>

                <input type="text"

                       name="nom"

                       value="{{ $poste->nom }}"

                       style="
                           width:100%;
                           padding:15px;
                           border:1px solid #ddd;
                           border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>
                    Salaire de base
                </label>

                <br><br>

                <input type="number"

                       name="salaire_base"

                       value="{{ $poste->salaire_base }}"

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
                >{{ $poste->description }}</textarea>

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

                        {{ $poste->statut ? 'selected' : '' }}>

                        Actif

                    </option>

                    <option value="0"

                        {{ !$poste->statut ? 'selected' : '' }}>

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

                Modifier Poste

            </button>

        </div>

    </form>

</div>

@endsection
