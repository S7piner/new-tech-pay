@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>

        <h1>
            Employés
        </h1>

        <p>
            Gestion complète des employés de l'entreprise
        </p>

    </div>

    <a href="{{ route('employes.create') }}"
       class="add-btn">

        + Ajouter Employé

    </a>

</div>

<div class="table-container">

    <table class="modern-table">

        <thead>

            <tr>

                <th>Employé</th>

                <th>Matricule</th>

                <th>Poste</th>

                <th>Catégorie</th>

                <th>Centre</th>

                <th>Type</th>

                <th>Salaire</th>

                <th>Statut</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @forelse($employes as $employe)

                <tr>

                    <!-- EMPLOYE -->

                    <td>

                        <div class="employee-box">

                            @if($employe->photo)

                                <img src="{{ asset(
                                    'storage/'.$employe->photo
                                ) }}"

                                     class="employee-photo">

                            @else

                                <div class="employee-placeholder">

                                    {{ strtoupper(
                                        substr(
                                            $employe->nom,
                                            0,
                                            1
                                        )
                                    ) }}

                                </div>

                            @endif

                            <div>

                                <a href="{{ route(
                                    'employes.show',
                                    $employe->id
                                ) }}"

                                   class="employee-name">

                                    {{ $employe->nom }}

                                    {{ $employe->prenom }}

                                </a>

                                <p class="employee-email">

                                    {{ $employe->email }}

                                </p>

                                <small class="employee-phone">

                                    {{ $employe->telephone }}

                                </small>

                            </div>

                        </div>

                    </td>

                    <!-- MATRICULE -->

                    <td>

                        <span class="badge-gray">

                            {{ $employe->matricule }}

                        </span>

                    </td>

                    <!-- POSTE -->

                    <td>

                        {{ $employe->poste->nom ?? '' }}

                    </td>

                    <!-- CATEGORIE -->

                    <td>

                        {{ $employe->categorie->nom ?? '' }}

                    </td>

                    <!-- CENTRE -->

                    <td>

                        <span class="badge-blue">

                            {{ $employe->centreCout->nom ?? '' }}

                        </span>

                    </td>

                    <!-- TYPE -->

                    <td>

                        <span class="badge-type">

                            {{ $employe->type_employe }}

                        </span>

                    </td>

                    <!-- SALAIRE -->

                    <td>

                        <strong>

                            {{ number_format(
                                $employe->salaire_base,
                                0,
                                ',',
                                ' '
                            ) }}

                            FCFA

                        </strong>

                    </td>

                    <!-- STATUT -->

                    <td>

                        <span class="badge-success">

                            {{ $employe->statut }}

                        </span>

                    </td>

                    <!-- ACTIONS -->

                    <td>

                        <div class="actions">

                            <a href="{{ route(
                                'employes.edit',
                                $employe->id
                            ) }}"

                               class="btn-edit">

                                Modifier

                            </a>

                            <form action="{{ route(
                                    'employes.destroy',
                                    $employe->id
                                ) }}"

                                  method="POST">

                                @csrf

                                @method('DELETE')

                                <button type="submit"

                                        class="btn-delete"

                                        onclick="
                                            return confirm(
                                                'Supprimer cet employé ?'
                                            )
                                        ">

                                    Supprimer

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9"
                        class="empty">

                        Aucun employé trouvé

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:20px;
}

.page-header h1{
    font-size:40px;
    color:#0f172a;
}

.page-header p{
    color:#64748b;
    margin-top:5px;
}

.add-btn{
    background:#2563eb;
    color:white;
    padding:15px 22px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.add-btn:hover{
    background:#1d4ed8;
}

.table-container{
    background:white;
    border-radius:24px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    overflow-x:auto;
}

.modern-table{
    width:100%;
    border-collapse:collapse;
}

.modern-table thead{
    background:#f8fafc;
}

.modern-table th{
    padding:18px;
    text-align:left;
    color:#475569;
    font-size:15px;
}

.modern-table td{
    padding:20px 18px;
    border-bottom:1px solid #f1f5f9;
}

.modern-table tbody tr:hover{
    background:#f8fafc;
}

.employee-box{
    display:flex;
    align-items:center;
    gap:15px;
}

.employee-photo{
    width:60px;
    height:60px;
    border-radius:50%;
    object-fit:cover;
}

.employee-placeholder{
    width:60px;
    height:60px;
    border-radius:50%;
    background:#2563eb;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    font-size:22px;
}

.employee-name{
    color:#2563eb;
    text-decoration:none;
    font-weight:700;
    font-size:17px;
}

.employee-email{
    color:#64748b;
    font-size:14px;
}

.employee-phone{
    color:#94a3b8;
}

.badge-blue,
.badge-type,
.badge-success,
.badge-gray{
    padding:8px 14px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.badge-blue{
    background:#dbeafe;
    color:#1d4ed8;
}

.badge-type{
    background:#ede9fe;
    color:#6d28d9;
}

.badge-success{
    background:#dcfce7;
    color:#166534;
}

.badge-gray{
    background:#f1f5f9;
    color:#475569;
}

.actions{
    display:flex;
    gap:10px;
}

.btn-edit{
    background:#facc15;
    color:black;
    padding:10px 14px;
    border-radius:10px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
}

.btn-delete{
    background:#ef4444;
    color:white;
    border:none;
    padding:10px 14px;
    border-radius:10px;
    cursor:pointer;
    font-size:14px;
    font-weight:600;
}

.empty{
    text-align:center;
    padding:40px;
    color:#64748b;
}

</style>

@endsection
