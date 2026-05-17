@extends('layouts.app')

@section('content')

<div style="padding:30px;">

    <h1>
        Ajouter Poste
    </h1>

    <br>

    <form action="{{ route('postes.store') }}"
          method="POST">

        @csrf

        <div style="
            background:white;
            padding:30px;
            border-radius:15px;
        ">

            <div style="margin-bottom:20px;">

                <label>Nom poste</label>

                <br><br>

                <input type="text"

                       name="nom"

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

                       style="
                           width:100%;
                           padding:15px;
                           border:1px solid #ddd;
                           border-radius:10px;
                       ">

            </div>

            <div style="margin-bottom:20px;">

                <label>Description</label>

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
                ></textarea>

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

                Ajouter Poste

            </button>

        </div>

    </form>

</div>

@endsection
