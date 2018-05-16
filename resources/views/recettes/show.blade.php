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
                            <td>{{ $recette->produit_id }}</td>
                            <td>{{ $recette->client_id }}</td>
                            <td>{{ $recette->prix * $recette->qtte }}</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
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