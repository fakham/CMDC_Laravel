@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produit</div>

                <div class="card-body">
                    <div class="input-group">
                        <input name="nom" class="form-control" type="text" placeholder="Nom Produit..."/>
                    </div>
                    <br>
                    <div class="input-group">
                        <textarea name="description" class="form-control" placeholder="Description..." rows="3"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <input name="prix" class="form-control" type="number" placeholder="Prix..."/>
                    </div>
                    <br>
                    <div class="input-group">
                        <input name="type" class="form-control" type="radio" checked="checked" onchange="checkCharge()">Charge</input>
                        <input name="type" class="form-control" type="radio" onchange="checkRecette()">Recette</input>
                    </div>
                    <br>
                    <div class="input-group">
                        <select name="typeProduit" class="form-control" id="typeProduit">
                            <option value="" disabled selected>Type..</option>
                            <option>Explotation</option>
                            <option>Financière</option>
                            <option>Non courante</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group" id="clientDiv">
                        <select name="client" class="form-control">
                            <option value="" disabled selected>Client..</option>
                            @foreach ($clients as $client)
                            <option value="{{$client->id}}">{{$client->nom}}</option>
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
                                    <form method="POST" action="{{'add/addClient'}}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <input name="nom" class="form-control" type="text" placeholder="Nom Client..."/>
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
                                            <input type="submit" class="btn btn-default" value="Ajouter"/>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group" id="fournisseurDiv">
                        <select name="fournisseur" class="form-control">
                            <option value="" disabled selected>Fourniseur..</option>
                            @foreach ($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
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
                                    <form method="POST" action="{{'add/addFournisseur'}}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="input-group">
                                                <input name="nom" class="form-control" type="text" placeholder="Nom Fournisseur..."/>
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
                                            <input type="submit" class="btn btn-default" value="Ajouter"/>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="input-group-btn">
                        <button class="btn btn-default">Enregistrer</button>
                        <a class="btn btn-danger">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#clientDiv').hide();
    function checkRecette() {
        $('#typeProduit option:gt(0)').remove();
        $("#typeProduit").append('<option value="Recette 1">Recette 1</option>');
        $("#typeProduit").append('<option value="Recette 2">Recette 2</option>');
        $("#typeProduit").append('<option value="Recette 3">Recette 3</option>');
        $('#fournisseurDiv').hide();
        $('#clientDiv').show();
    }
    function checkCharge() {
        $('#typeProduit option:gt(0)').remove();
        $("#typeProduit").append('<option value="Explotation">Explotation</option>');
        $("#typeProduit").append('<option value="Financière">Financière</option>');
        $("#typeProduit").append('<option value="Non courante">Non courante</option>');
        $('#fournisseurDiv').show();
        $('#clientDiv').hide();
    }
</script>

@endsection