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
                                        @foreach ($produits as $produit)
                                        <tr>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{ $produit->description }}</td>
                                            <td><a type="button" class="btn btn-default" href="produit/{{ $produit->id }}/edit">Modifier</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le produit (\'{{ $produit->nom }}\')?')" href="produit/{{ $produit->id }}/delete">Supprimer</a></td>
                                        </tr>
                                        @endforeach
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
                                        @foreach ($fournisseurs as $fournisseur)
                                        <tr>
                                            <td>{{ $fournisseur->nom }}</td>
                                            <td>{{ $fournisseur->telephone }}</td>
                                            <td><a type="button" class="btn btn-default" href="fournisseur/{{ $fournisseur->id }}/edit">Modifier</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le fournisseur (\'{{ $fournisseur->nom }}\')?')" href="fournisseur/{{ $fournisseur->id }}/delete">Supprimer</a></td>
                                        </tr>
                                        @endforeach
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
                                        @foreach ($clients as $client)
                                        <tr>
                                            <td>{{$client->nom}}</td>
                                            <td>{{$client->telephone}}</td>
                                            <td><a type="button" class="btn btn-default" href="client/{{ $client->id }}/edit">Modifier</a></td>
                                            <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le client (\'{{ $client->nom }}\')?')" href="client/{{ $client->id }}/delete">Supprimer</a></td>
                                        </tr>
                                        @endforeach
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