<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ProLogiciel RH & Paie</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f1f5f9;
            overflow-x:hidden;
        }

        /*
        |--------------------------------------------------------------------------
        | SIDEBAR
        |--------------------------------------------------------------------------
        */

        .sidebar{
            position:fixed;
            left:0;
            top:0;
            width:270px;
            height:100vh;
            background:#0f172a;
            overflow-y:auto;
            padding:25px 20px;
            color:white;
        }

        .logo{
            font-size:24px;
            font-weight:bold;
            margin-bottom:40px;
            color:white;
        }

        .logo span{
            color:#3b82f6;
        }

        .menu-title{
            color:#94a3b8;
            font-size:13px;
            margin:25px 0 10px;
            text-transform:uppercase;
        }

        .menu a{
            display:flex;
            align-items:center;
            gap:12px;
            text-decoration:none;
            color:#e2e8f0;
            padding:14px 15px;
            border-radius:12px;
            margin-bottom:8px;
            transition:0.3s;
            font-size:15px;
        }

        .menu a:hover{
            background:#1e293b;
            transform:translateX(4px);
        }

        .menu a i{
            width:20px;
        }

        /*
        |--------------------------------------------------------------------------
        | MAIN
        |--------------------------------------------------------------------------
        */

        .main{
            margin-left:270px;
            min-height:100vh;
        }

        /*
        |--------------------------------------------------------------------------
        | TOPBAR
        |--------------------------------------------------------------------------
        */

        .topbar{
            background:white;
            padding:20px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
            position:sticky;
            top:0;
            z-index:100;
        }

        .topbar-left h2{
            color:#0f172a;
            font-size:24px;
        }

        .topbar-left p{
            color:#64748b;
            margin-top:5px;
        }

        .topbar-right{
            display:flex;
            align-items:center;
            gap:20px;
        }

        .badge-role{
            background:#2563eb;
            color:white;
            padding:8px 15px;
            border-radius:30px;
            font-size:14px;
        }

        .user-box{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#2563eb;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            font-weight:bold;
            font-size:18px;
        }

        /*
        |--------------------------------------------------------------------------
        | CONTENT
        |--------------------------------------------------------------------------
        */

        .content{
            padding:30px;
        }

        /*
        |--------------------------------------------------------------------------
        | CARDS
        |--------------------------------------------------------------------------
        */

        .cards{
            display:grid;
            grid-template-columns:
            repeat(auto-fit,minmax(240px,1fr));
            gap:20px;
            margin-top:30px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:18px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card h3{
            color:#64748b;
            margin-bottom:10px;
            font-size:15px;
        }

        .card h1{
            color:#0f172a;
            font-size:32px;
        }

        /*
        |--------------------------------------------------------------------------
        | BOX
        |--------------------------------------------------------------------------
        */

        .box{
            background:white;
            padding:30px;
            border-radius:18px;
            margin-top:30px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        /*
        |--------------------------------------------------------------------------
        | TABLE
        |--------------------------------------------------------------------------
        */

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#f8fafc;
            padding:16px;
            text-align:left;
            color:#334155;
        }

        table td{
            padding:16px;
            border-top:1px solid #eee;
        }

        /*
        |--------------------------------------------------------------------------
        | BUTTONS
        |--------------------------------------------------------------------------
        */

        .btn{
            padding:12px 18px;
            border:none;
            border-radius:10px;
            cursor:pointer;
            text-decoration:none;
            color:white;
            display:inline-block;
        }

        .btn-primary{
            background:#2563eb;
        }

        .btn-danger{
            background:#ef4444;
        }

        .btn-warning{
            background:#f59e0b;
        }

        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        .footer{
            margin-top:40px;
            color:#94a3b8;
            text-align:center;
            font-size:14px;
        }

        /*
        |--------------------------------------------------------------------------
        | RESPONSIVE
        |--------------------------------------------------------------------------
        */

        @media(max-width:900px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .main{
                margin-left:0;
            }

            .topbar{
                flex-direction:column;
                align-items:flex-start;
                gap:15px;
            }

        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo">
            Pro<span>Logiciel</span>
        </div>

        <div class="menu">

            <div class="menu-title">
                Général
            </div>

            <a href="/dashboard">
                <i class="fa fa-home"></i>
                Dashboard
            </a>

            <div class="menu-title">
                Ressources Humaines
            </div>

            <a href="/employes">
                <i class="fa fa-users"></i>
                Employés
            </a>

            <a href="/contrats">
                <i class="fa fa-file-contract"></i>
                Contrats
            </a>

            <a href="/categories">
                <i class="fa fa-layer-group"></i>
                Catégories
            </a>

            <a href="/postes">
                <i class="fa fa-briefcase"></i>
                Postes
            </a>

                <a href="/centres-cout">
                    <i class="fa fa-building"></i>
                        Centres de coût
                </a>

            <div class="menu-title">
                Paie
            </div>



            <a href="/bulletins">

    <i class="fa fa-file-invoice"></i>

    Bulletins

</a>

            <a href="/pointages">

    <i class="fa fa-clock"></i>

    Pointages

</a>

<a href="/rubriques">

    <i class="fa fa-money-bill"></i>

    Rubriques Paie

</a>

<a href="/periodes-paie">

    <i class="fa fa-calendar"></i>

    Périodes Paie

</a>

            <a href="#">
                <i class="fa fa-calendar-check"></i>
                Congés
            </a>

            <a href="#">
                <i class="fa fa-chart-column"></i>
                Rapports
            </a>

            <div class="menu-title">
                Paramètres
            </div>

            <a href="#">
                <i class="fa fa-gear"></i>
                Paramètres
            </a>

            <a href="/logout">
                <i class="fa fa-right-from-bracket"></i>
                Déconnexion
            </a>

        </div>

    </div>

    <!-- MAIN -->

    <div class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="topbar-left">

                <h2>
                    {{ auth()->user()->entreprise->nom_entreprise ?? '' }}
                </h2>

                <p>
                    Bienvenue
                    {{ auth()->user()->name }}
                </p>

            </div>

            <div class="topbar-right">

                <div class="badge-role">
                    {{ auth()->user()->role }}
                </div>

                <div class="user-box">

                    <div class="avatar">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->

        <div class="content">

            @yield('content')

            <div class="footer">

                © {{ date('Y') }}
                ProLogiciel RH & Paie SaaS —
                Tous droits réservés

            </div>

        </div>

    </div>

</body>
</html>
