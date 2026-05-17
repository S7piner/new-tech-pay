{{-- resources/views/entreprises/create.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer votre entreprise</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f1f5f9;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .container{
            width:100%;
            max-width:1100px;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
            display:grid;
            grid-template-columns:1fr 1.2fr;
        }

        .left{
            background:linear-gradient(135deg,#2563eb,#1e3a8a);
            color:white;
            padding:60px 40px;
        }

        .left h1{
            font-size:38px;
            margin-bottom:20px;
            line-height:1.3;
        }

        .left p{
            line-height:1.8;
            opacity:0.9;
        }

        .features{
            margin-top:40px;
        }

        .features div{
            margin-bottom:20px;
            font-size:16px;
        }

        .right{
            padding:40px;
        }

        .right h2{
            margin-bottom:30px;
            color:#0f172a;
        }

        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }

        .form-group{
            display:flex;
            flex-direction:column;
        }

        .form-group label{
            margin-bottom:8px;
            color:#334155;
            font-weight:bold;
        }

        .form-group input,
        .form-group textarea{
            padding:14px;
            border:1px solid #cbd5e1;
            border-radius:10px;
            outline:none;
            transition:0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus{
            border-color:#2563eb;
        }

        textarea{
            height:120px;
            resize:none;
        }

        .full{
            grid-column:1 / 3;
        }

        .btn{
            width:100%;
            margin-top:30px;
            padding:16px;
            border:none;
            background:#2563eb;
            color:white;
            border-radius:10px;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        .errors{
            background:#fee2e2;
            color:#b91c1c;
            padding:15px;
            border-radius:10px;
            margin-bottom:20px;
        }

        @media(max-width:900px){

            .container{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:700px){

            .grid{
                grid-template-columns:1fr;
            }

            .full{
                grid-column:auto;
            }

        }

    </style>

</head>
<body>

<div class="container">

    <div class="left">

        <h1>
            Gérez votre entreprise facilement
        </h1>

        <p>
            Gérez vos employés, vos bulletins de paie,
            vos présences et toute votre comptabilité
            depuis une seule plateforme moderne.
        </p>

        <div class="features">

            <div>✔ Gestion des employés</div>

            <div>✔ Bulletins automatiques</div>

            <div>✔ Génération PDF</div>

            <div>✔ Présences et congés</div>

            <div>✔ Gestion multi-entreprises</div>

            <div>✔ Tableau de bord professionnel</div>

        </div>

    </div>

    <div class="right">

        <h2>
            Inscription Entreprise
        </h2>

        @if ($errors->any())

            <div class="errors">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('entreprises.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="grid">

                {{-- ADMIN ENTREPRISE --}}

                <div class="form-group">
                    <label>Nom administrateur</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Email connexion</label>

                    <input type="email"
                           name="user_email"
                           value="{{ old('user_email') }}">
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>

                    <input type="password"
                           name="password">
                </div>

                {{-- ENTREPRISE --}}

                <div class="form-group">
                    <label>Nom entreprise</label>

                    <input type="text"
                           name="nom_entreprise"
                           value="{{ old('nom_entreprise') }}">
                </div>

                <div class="form-group">
                    <label>Sigle</label>

                    <input type="text"
                           name="sigle"
                           value="{{ old('sigle') }}">
                </div>

                <div class="form-group">
                    <label>Activité</label>

                    <input type="text"
                           name="activite"
                           value="{{ old('activite') }}">
                </div>

                <div class="form-group">
                    <label>Secteur</label>

                    <input type="text"
                           name="secteur"
                           value="{{ old('secteur') }}">
                </div>

                <div class="form-group">
                    <label>NIF</label>

                    <input type="text"
                           name="nif"
                           value="{{ old('nif') }}">
                </div>

                <div class="form-group">
                    <label>CNSS</label>

                    <input type="text"
                           name="cnss"
                           value="{{ old('cnss') }}">
                </div>

                <div class="form-group">
                    <label>CNAMGS</label>

                    <input type="text"
                           name="cnamgs"
                           value="{{ old('cnamgs') }}">
                </div>

                <div class="form-group">
                    <label>Téléphone</label>

                    <input type="text"
                           name="telephone"
                           value="{{ old('telephone') }}">
                </div>

                <div class="form-group">
                    <label>Email entreprise</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Ville</label>

                    <input type="text"
                           name="ville"
                           value="{{ old('ville') }}">
                </div>

                <div class="form-group">
                    <label>Région</label>

                    <input type="text"
                           name="region"
                           value="{{ old('region') }}">
                </div>

                <div class="form-group">
                    <label>Pays</label>

                    <input type="text"
                           name="pays"
                           value="{{ old('pays') }}">
                </div>

                <div class="form-group full">
                    <label>Adresse</label>

                    <textarea name="adresse">{{ old('adresse') }}</textarea>
                </div>

                <div class="form-group full">
                    <label>Logo entreprise</label>

                    <input type="file"
                           name="logo">
                </div>

            </div>

            <button type="submit" class="btn">
                Créer mon entreprise
            </button>

        </form>

    </div>

</div>

</body>
</html>
