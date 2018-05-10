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
                        <tr>
                            <td>10/05/2018</td>
                            <td>Produit 1</td>
                            <td>Client 1</td>
                            <td>1000 DH</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
                        </tr>
                        <tr>
                            <td>10/05/2018</td>
                            <td>Produit 1</td>
                            <td>Client 1</td>
                            <td>1000 DH</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
                        </tr>
                        <tr>
                            <td>10/05/2018</td>
                            <td>Produit 1</td>
                            <td>Client 1</td>
                            <td>1000 DH</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
                        </tr>
                        <tr>
                            <td>10/05/2018</td>
                            <td>Produit 1</td>
                            <td>Client 1</td>
                            <td>1000 DH</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
                        </tr>
                        <tr>
                            <td>10/05/2018</td>
                            <td>Produit 1</td>
                            <td>Client 1</td>
                            <td>1000 DH</td>
                            <td><button class="btn btn-default">Modifier</button></td>
                            <td><a class="btn btn-danger">Supprimer</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection