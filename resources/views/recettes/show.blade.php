@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier ou supprimer votre recettes</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Client</th>
                            <th>Prix</th>
                        </thead>
                        <tbody>
                        @foreach ($recettes as $recette)
                        <tr>
                            <td>{{ $recette->date }}</td>
                            <td>{{ $recette->produit }}</td>
                            <td>{{ $recette->client }}</td>
                            <td>{{ $recette->prix * $recette->qtte }}</td>
                            <td><a class="btn btn-info" href="/recettes/{{ $recette->id }}/edit">Modifier</a></td>
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