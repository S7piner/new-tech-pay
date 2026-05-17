<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>
        Bulletin de Paie
    </title>

    <style>

        @page{
            margin:20px;
        }

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#1e293b;
            margin:0;
            padding:0;
        }

        /*
        |--------------------------------------------------------------------------
        | CONTAINER
        |--------------------------------------------------------------------------
        */

        .container{
            width:100%;
            border:1px solid #dbeafe;
            padding:25px;
            border-radius:12px;
        }

        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        .header{
            width:100%;
            margin-bottom:25px;
        }

        .left{
            width:50%;
            float:left;
        }

        .right{
            width:50%;
            float:right;
            text-align:right;
        }

        .clear{
            clear:both;
        }

        .logo{
            width:85px;
            height:85px;
            border-radius:12px;
            margin-bottom:12px;
        }

        .company-name{
            font-size:24px;
            font-weight:bold;
            color:#2563eb;
            margin-bottom:8px;
        }

        .company-info{
            line-height:1.7;
            color:#475569;
            font-size:11px;
        }

        .bulletin-title{
            font-size:28px;
            font-weight:bold;
            color:#1d4ed8;
            margin-bottom:15px;
        }

        .bulletin-info{
            line-height:1.9;
            font-size:12px;
        }

        /*
        |--------------------------------------------------------------------------
        | SECTION TITLE
        |--------------------------------------------------------------------------
        */

        .section-title{
            background:#eff6ff;
            padding:12px 16px;
            border-left:5px solid #2563eb;
            font-size:15px;
            font-weight:bold;
            color:#1e3a8a;
            margin-top:30px;
            margin-bottom:15px;
        }

        /*
        |--------------------------------------------------------------------------
        | INFO GRID
        |--------------------------------------------------------------------------
        */

        .info-grid{
            width:100%;
            margin-bottom:10px;
        }

        .info-card{
            width:48%;
            float:left;
            background:#f8fafc;
            border:1px solid #e2e8f0;
            border-radius:10px;
            padding:14px;
            margin-bottom:15px;
        }

        .info-card.right-card{
            float:right;
        }

        .label{
            font-size:11px;
            color:#64748b;
            margin-bottom:6px;
        }

        .value{
            font-size:13px;
            font-weight:bold;
            color:#0f172a;
        }

        /*
        |--------------------------------------------------------------------------
        | TABLE
        |--------------------------------------------------------------------------
        */

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        th{
            background:#2563eb;
            color:white;
            padding:12px;
            font-size:12px;
            text-align:left;
        }

        td{
            border:1px solid #e2e8f0;
            padding:11px;
            font-size:12px;
        }

        tr:nth-child(even){
            background:#f8fafc;
        }

        /*
        |--------------------------------------------------------------------------
        | SUMMARY
        |--------------------------------------------------------------------------
        */

        .summary{
            width:45%;
            float:right;
            margin-top:20px;
        }

        .summary td{
            padding:12px;
            font-size:12px;
        }

        .summary-label{
            background:#f8fafc;
            font-weight:bold;
        }

        .summary-value{
            text-align:right;
            font-weight:bold;
        }

        .net-row td{
            background:#dcfce7;
            color:#166534;
            font-size:15px;
            font-weight:bold;
        }

        /*
        |--------------------------------------------------------------------------
        | SIGNATURES
        |--------------------------------------------------------------------------
        */

        .signatures{
            margin-top:90px;
            width:100%;
        }

        .signature-box{
            width:40%;
            text-align:center;
        }

        .signature-left{
            float:left;
        }

        .signature-right{
            float:right;
        }

        .signature-line{
            margin-top:60px;
            border-top:1px solid #334155;
            padding-top:8px;
            font-size:11px;
            color:#475569;
        }

        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        .footer{
            margin-top:40px;
            text-align:center;
            font-size:10px;
            color:#94a3b8;
        }

    </style>

</head>

<body>

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <!-- LEFT -->

        <div class="left">

            @if($bulletin->entreprise->logo)

                <img src="{{ public_path(
                    'storage/' .
                    $bulletin->entreprise->logo
                ) }}"

                class="logo">

            @endif

            <div class="company-name">

                {{ $bulletin
                    ->entreprise
                    ->nom_entreprise }}

            </div>

            <div class="company-info">

                {{ $bulletin
                    ->entreprise
                    ->adresse }}

                <br>

                Tél :
                {{ $bulletin
                    ->entreprise
                    ->telephone }}

                <br>

                Email :
                {{ $bulletin
                    ->entreprise
                    ->email }}

            </div>

        </div>

        <!-- RIGHT -->

        <div class="right">

            <div class="bulletin-title">

                BULLETIN DE PAIE

            </div>

            <div class="bulletin-info">

                <strong>
                    Bulletin N° :
                </strong>

                {{ $bulletin->id }}

                <br>

                <strong>
                    Date :
                </strong>

                {{ now()->format('d/m/Y') }}

                <br>

                <strong>
                    Période :
                </strong>

                {{ $bulletin
                    ->periodePaie
                    ->mois }}

                {{ $bulletin
                    ->periodePaie
                    ->annee }}

            </div>

        </div>

    </div>

    <div class="clear"></div>

    <!-- EMPLOYEE -->

    <div class="section-title">

        Informations Employé

    </div>

    <div class="info-grid">

        <div class="info-card">

            <div class="label">
                Employé
            </div>

            <div class="value">

                {{ $bulletin
                    ->employe
                    ->nom }}

                {{ $bulletin
                    ->employe
                    ->prenom }}

            </div>

        </div>

        <div class="info-card right-card">

            <div class="label">
                Poste
            </div>

            <div class="value">

                {{ $bulletin
                    ->employe
                    ->poste->nom ?? '' }}

            </div>

        </div>

        <div class="info-card">

            <div class="label">
                Matricule
            </div>

            <div class="value">

                {{ $bulletin
                    ->employe
                    ->matricule ?? '' }}

            </div>

        </div>

        <div class="info-card right-card">

            <div class="label">
                CNSS
            </div>

            <div class="value">

                {{ $bulletin
                    ->entreprise
                    ->cnss ?? '' }}

            </div>

        </div>

    </div>

    <div class="clear"></div>

    <!-- DETAILS -->

    <div class="section-title">

        Détails du Bulletin

    </div>

    <table>

        <thead>

            <tr>

                <th>
                    Rubrique
                </th>

                <th>
                    Type
                </th>

                <th>
                    Montant
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach(
                $bulletin->lignes
                as $ligne
            )

                <tr>

                    <td>

                        {{ $ligne->libelle }}

                    </td>

                    <td>

                        {{ ucfirst(
                            $ligne->type
                        ) }}

                    </td>

                    <td>

                        {{ number_format(
                            $ligne->montant,
                            0,
                            ',',
                            ' '
                        ) }}

                        FCFA

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <!-- SUMMARY -->

    <table class="summary">

        <tr>

            <td class="summary-label">
                Salaire Brut
            </td>

            <td class="summary-value">

                {{ number_format(
                    $bulletin->brut,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </td>

        </tr>

        <tr>

            <td class="summary-label">
                Total Retenues
            </td>

            <td class="summary-value">

                {{ number_format(
                    $bulletin->total_retenues,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </td>

        </tr>

        <tr class="net-row">

            <td>
                NET À PAYER
            </td>

            <td style="text-align:right;">

                {{ number_format(
                    $bulletin->net_a_payer,
                    0,
                    ',',
                    ' '
                ) }}

                FCFA

            </td>

        </tr>

    </table>

    <div class="clear"></div>

    <!-- SIGNATURES -->

    <div class="signatures">

        <div class="signature-box signature-left">

            <div class="signature-line">

                Signature Employé

            </div>

        </div>

        <div class="signature-box signature-right">

            <div class="signature-line">

                Signature RH

            </div>

        </div>

    </div>

    <div class="clear"></div>

    <!-- FOOTER -->

    <div class="footer">

        Bulletin généré automatiquement
        par NEW TECH PAY —
        Plateforme RH & Paie professionnelle

    </div>

</div>

</body>

</html>
