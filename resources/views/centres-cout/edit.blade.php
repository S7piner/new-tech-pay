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

            Modifier Centre

        </h1>

        <p style="
            color:#64748b;
            margin-top:5px;
        ">

            Modification du centre de coût

        </p>

    </div>

</div>

<div class="box">

    <form action="{{ route(
            'centres-cout.update',
            $centres_cout->id
        ) }}"

          method="POST">

        @csrf

        @method('PUT')

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

                       value="{{ $centres_cout->nom }}"

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

                       value="{{ $centres_cout->code }}"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Type</label>

                <br><br>

                <input type="text"

                       name="type"

                       value="{{ $centres_cout->type }}"

                       style="
                            width:100%;
                            padding:15px;
                       ">

            </div>

            <div>

                <label>Responsable</label>

                <br><br>

                <input type="text"

                       name="responsable"

                       value="{{ $centres_cout->responsable }}"

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

                       value="{{ $centres_cout->telephone }}"

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

                       value="{{ $centres_cout->email }}"

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

                       value="{{ $centres_cout->localisation }}"

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

                       value="{{ $centres_cout->budget }}"

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
                          ">{{ $centres_cout->description }}</textarea>

            </div>

        </div>

        <br>

        <button type="submit"

                class="btn btn-primary">

            Modifier Centre

        </button>

    </form>

</div>

@endsection
