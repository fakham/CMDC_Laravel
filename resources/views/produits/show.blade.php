@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programmer</div>

                <div class="card-body">
                    <div class="col-xs-6">
                        <h2 class="sub-header"><a data-toggle="collapse" href="#produits">Table Produits</a></h2>
                        <div id="produits" class="panel-collapse collapse">
                            <div class="table-responsive">  
                                <table class="table table-striped" width="100"style="float:left;">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Produit 1</td>
                                        <td>Desc 1</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Produit 1</td>
                                        <td>Desc 1</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Produit 1</td>
                                        <td>Desc 1</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Produit 1</td>
                                        <td>Desc 1</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Produit 1</td>
                                        <td>Desc 1</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <h2 class="sub-header"><a data-toggle="collapse" href="#fournisseurs">Table Fournisseurs</a></h2>
                        <div id="fournisseurs" class="panel-collapse collapse">
                            <div class="table-responsive">  
                                <table class="table table-striped" width="100"style="float:left;">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Telephone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Fournisseur 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Fournisseur 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Fournisseur 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Fournisseur 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Fournisseur 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <h2 class="sub-header"><a data-toggle="collapse" href="#clients">Table Clients</a></h2>
                        <div id="clients" class="panel-collapse collapse">
                            <div class="table-responsive">  
                                <table class="table table-striped" width="100"style="float:left;">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Telephone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Client 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Client 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Client 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Client 1</td>
                                        <td>0606060677</td>
                                        <td><button class="btn btn-default">Modifier</button></td>
                                        <td><a class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                    <tr>
                                        <td>Client 1</td>
                                        <td>0606060677</td>
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
        </div>
    </div>
</div>


@endsection