@extends('../layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produit</div>

                <div class="card-body">
                    <form method="POST" id="formProduit" action="/produit/{{ $produit->id }}/update" onsubmit="return false">
                        @csrf
                        <div class="input-group">
                            <input name="nom" class="form-control" type="text" placeholder="Nom Produit..." value="{{ $produit->nom }}"/>
                        </div>
                        <br>
                        <div class="input-group">
                            <textarea name="description" class="form-control" placeholder="Description..." rows="3">{{ $produit->description }}</textarea>
                        </div>
                        <br>
                        <div class="input-group">
                            <input name="prix" class="form-control" type="number" placeholder="Prix..." value="{{ $produit->prix }}"/>
                        </div>
                        <br>
                        <div class="input-group">
                            <input name="typeProduit" value="charge" class="form-control" checked="checked" type="radio" onchange="checkCharge()">Charge</input>
                            <input name="typeProduit" value="recette" class="form-control" type="radio" onchange="checkRecette()">Recette</input>
                        </div>
                        <br>
                        <div class="input-group">
                            <select name="type" class="form-control" id="type" value="{{ $produit->type }}">
                                <option value="" disabled>Type..</option>
                                <option value="Explotation">Explotation</option>
                                <option value="Financière">Financière</option>
                                <option value="Non courante">Non courante</option>
                            </select>
                        </div>
                        <br>
                        <div class="input-group" id="clientDiv">
                            <select name="client" class="form-control" onchange="getSelectedValue(this)">
                                <option value="" disabled>Client..</option>
                                @foreach ($clients as $client)
                                    @if ($produit->client_id == $client->id)
                                    <option value="{{$client->id}}" selected>{{$client->nom}}</option>
                                    @else
                                    <option value="{{$client->id}}">{{$client->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button class="btn btn-default" style="margin-left: 10px" data-toggle="modal" data-target="#clientModal">Ajouter</button>

                            <!-- Modal -->
                            <div class="modal fade" id="clientModal" role="dialog">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header w-100">
                                            <h4 class="modal-title w-100">Ajouter Client</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="POST" action="{{'/produits/add/addClient'}}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input name="nom_client" class="form-control" type="text" placeholder="Nom Client..."/>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <textarea name="activite" class="form-control" placeholder="Activié..." rows="3"></textarea>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <input name="region" class="form-control" type="text" placeholder="Region..."/>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <input name="telephone" class="form-control" type="text" placeholder="Telephone..."/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default">Ajouter</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group" id="fournisseurDiv">
                            <select name="fournisseur" class="form-control" onchange="getSelectedValue(this)">
                                <option value="" disabled selected>Fourniseur..</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    @if ($produit->fournisseur_id == $fournisseur->id)
                                    <option value="{{$fournisseur->id}}" selected>{{$fournisseur->nom}}</option>
                                    @else
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button class="btn btn-default" style="margin-left: 10px" data-toggle="modal" data-target="#fournisseurModal">Ajouter</button>

                            <!-- Modal -->
                            <div class="modal fade" id="fournisseurModal" role="dialog">
                                <div class="modal-dialog">
                                
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header w-100">
                                            <h4 class="modal-title w-100">Ajouter Fournisseur</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="POST" action="{{'/produits/add/addFournisseur'}}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <input name="nom_fournisseur" class="form-control" type="text" placeholder="Nom Fournisseur..."/>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <textarea name="activite" class="form-control" placeholder="Activié..." rows="3"></textarea>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <input name="region" class="form-control" type="text" placeholder="Region..."/>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <input name="telephone" class="form-control" type="text" placeholder="Telephone..."/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default">Ajouter</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">Enregistrer</button>
                            <a class="btn btn-danger">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#clientDiv').hide();

    function checkRecette() {
        $('#type option:gt(0)').remove();
        $("#type").append('<option value="Recette 1">Recette 1</option>');
        $("#type").append('<option value="Recette 2">Recette 2</option>');
        $("#type").append('<option value="Recette 3">Recette 3</option>');
        $('#fournisseurDiv').hide();
        $('#clientDiv').show();
    }
    function checkCharge() {
        $('#type option:gt(0)').remove();
        $("#type").append('<option value="Explotation">Explotation</option>');
        $("#type").append('<option value="Financière">Financière</option>');
        $("#type").append('<option value="Non courante">Non courante</option>');
        $('#fournisseurDiv').show();
        $('#clientDiv').hide();
    }
</script>

@endsection