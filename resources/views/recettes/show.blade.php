@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recettes</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Client</th>
                            <th>Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($recettes as $recette)
                        <tr>
                            <td>{{ $recette->date }}</td>
                            <td>{{ $recette->produit }}</td>
                            <td>{{ $recette->client }}</td>
                            <td>{{ $recette->prix * $recette->qtte }}</td>
                            <td><a class="btn btn-default" href="/recettes/{{ $recette->id }}/edit">Modifier</a></td>
                            <td><a class="btn btn-danger" href="/recettes/{{ $recette->id }}/delete" onclick="return confirm('Voulez-vous supprimer cette recette?')">Supprimer</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection