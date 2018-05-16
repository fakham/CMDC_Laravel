@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Charges</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Fournisseur</th>
                            <th>Prix</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($charges as $charge)
                        <tr>
                            <td>{{ $charge->date }}</td>
                            <td>{{ $charge->produit }}</td>
                            <td>{{ $charge->fournisseur }}</td>
                            <td>{{ $charge->prix * $charge->qtte }}</td>
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