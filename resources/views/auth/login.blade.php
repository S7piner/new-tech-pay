<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Connexion Entreprise
    </title>

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
            padding:30px;
        }

        .container{
            width:100%;
            max-width:1100px;
            background:white;
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 15px 40px rgba(0,0,0,0.1);
            display:grid;
            grid-template-columns:1fr 1fr;
        }

        /*
        |--------------------------------------------------------------------------
        | LEFT
        |--------------------------------------------------------------------------
        */

        .left{
            background:linear-gradient(
                135deg,
                #2563eb,
                #1e3a8a
            );

            color:white;

            padding:60px;
        }

        .left h1{
            font-size:42px;
            line-height:1.3;
            margin-bottom:20px;
        }

        .left p{
            line-height:1.8;
            opacity:0.9;
        }

        .features{
            margin-top:40px;
        }

        .features div{
            margin-bottom:18px;
            font-size:16px;
        }

        /*
        |--------------------------------------------------------------------------
        | RIGHT
        |--------------------------------------------------------------------------
        */

        .right{
            padding:60px;
        }

        .logo{
            font-size:32px;
            font-weight:900;
            color:#2563eb;
            margin-bottom:15px;
        }

        .subtitle{
            color:#64748b;
            margin-bottom:40px;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-weight:700;
            color:#334155;
        }

        .form-group input{
            width:100%;
            padding:15px;
            border:1px solid #cbd5e1;
            border-radius:12px;
            outline:none;
            transition:0.3s;
            font-size:15px;
        }

        .form-group input:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,0.1);
        }

        .remember{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:25px;
            color:#475569;
        }

        .btn{
            width:100%;
            border:none;
            background:#2563eb;
            color:white;
            padding:16px;
            border-radius:12px;
            cursor:pointer;
            font-size:16px;
            font-weight:700;
            transition:0.3s;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        .links{
            margin-top:25px;
            display:flex;
            justify-content:space-between;
            flex-wrap:wrap;
            gap:15px;
        }

        .links a{
            color:#2563eb;
            text-decoration:none;
            font-weight:600;
        }

        .links a:hover{
            text-decoration:underline;
        }

        .register-box{
            margin-top:35px;
            padding:20px;
            background:#eff6ff;
            border-radius:15px;
            text-align:center;
        }

        .register-box p{
            margin-bottom:15px;
            color:#334155;
        }

        .register-btn{
            display:inline-block;
            background:#0f172a;
            color:white;
            padding:14px 24px;
            border-radius:12px;
            text-decoration:none;
            font-weight:700;
            transition:0.3s;
        }

        .register-btn:hover{
            background:#020617;
        }

        .errors{
            background:#fee2e2;
            color:#b91c1c;
            padding:15px;
            border-radius:12px;
            margin-bottom:25px;
        }

        @media(max-width:900px){

            .container{
                grid-template-columns:1fr;
            }

            .left{
                display:none;
            }

            .right{
                padding:40px 30px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <!-- LEFT -->

    <div class="left">

        <h1>
            Gérez votre entreprise intelligemment
        </h1>

        <p>
            Gérez vos employés, vos bulletins,
            vos présences, votre paie et votre
            comptabilité depuis une plateforme
            professionnelle moderne.
        </p>

        <div class="features">

            <div>
                ✔ Gestion RH complète
            </div>

            <div>
                ✔ Bulletins automatiques
            </div>

            <div>
                ✔ Pointages & absences
            </div>

            <div>
                ✔ Gestion multi-entreprises
            </div>

            <div>
                ✔ Comptabilité & paie
            </div>

            <div>
                ✔ Rapports & statistiques
            </div>

        </div>

    </div>

    <!-- RIGHT -->

    <div class="right">

        <div class="logo">

            NEW TECH PAY

        </div>

        <p class="subtitle">

            Connexion entreprise

        </p>

        <!-- ERRORS -->

        @if ($errors->any())

            <div class="errors">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- FORM -->

        <form method="POST"
              action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Adresse Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required>

            </div>

            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Mot de passe
                </label>

                <input type="password"
                       name="password"
                       required>

            </div>

            <!-- REMEMBER -->

            <div class="remember">

                <input type="checkbox"
                       name="remember">

                <span>
                    Se souvenir de moi
                </span>

            </div>

            <!-- BUTTON -->

            <button type="submit"
                    class="btn">

                Se connecter

            </button>

        </form>

        <!-- LINKS -->

        <div class="links">

            @if (Route::has('password.request'))

                <a href="{{ route('password.request') }}">

                    Mot de passe oublié ?

                </a>

            @endif

        </div>

        <!-- REGISTER -->

        <div class="register-box">

            <p>
                Vous n'avez pas encore de compte entreprise ?
            </p>

            <a href="{{ route('entreprises.create') }}"
               class="register-btn">

                Créer une entreprise

            </a>

        </div>

    </div>

</div>

</body>
</html>
