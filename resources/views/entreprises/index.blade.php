<h1>Liste des entreprises</h1>

<a href="{{ route('entreprises.create') }}">
    Ajouter
</a>

@foreach($entreprises as $entreprise)

    <p>
        {{ $entreprise->nom_entreprise }}
    </p>

@endforeach
