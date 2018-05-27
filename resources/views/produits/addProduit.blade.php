@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Ajouter Produit</h4>
                </div>
                <div class="content">
                    <form method="POST" id="formProduit" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nom Produit</label>
                                    <input name="nom" class="form-control border-input" type="text" placeholder="Nom Produit..." value="{{ old('nom') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control border-input" placeholder="Description..." rows="3" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center>
                                <div class="col-md-3">
                                    <div class="form-group radio">
                                        <label>Charge
                                            <input type="radio" id="Charge" value="charge" checked="checked" name="typeProduit" class="form-control" onchange="checkCharge()">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group radio">
                                        <label>Recette
                                            <input type="radio" id="Recette" value="recette" name="typeProduit" class="form-control" onchange="checkRecette()">
                                        </label>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group autocomplete">
                                    <label>Type</label>
                                    <select name="type" class="form-control border-input" id="type">
                                        <option value="" disabled selected>Type..</option>
                                        <option value="Explotation">Explotation</option>
                                        <option value="Financière">Financière</option>
                                        <option value="Non courante">Non courante</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="clientDiv">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client" class="form-control border-input" onchange="getSelectedValue(this)">
                                        <option value="" disabled selected>Client..</option>
                                        @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="fournisseurDiv">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fournisseur</label>
                                    <select name="fournisseur" class="form-control border-input" onchange="getSelectedValue(this)">
                                        <option value="" disabled selected>Fourniseur..</option>
                                        @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <input type="submit" form="formProduit" class="btn btn-default" value="Enregistrer">
                            <a class="btn btn-danger" href="/programmer">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    document.getElementById("activeProfile").classList.remove('active');
    document.getElementById("activeDashboard").classList.remove('active');
    document.getElementById("activeCharge").classList.remove('active');
    document.getElementById("activeRecette").classList.remove('active');
    document.getElementById("activeProgramme").classList.add('active');

    var url = '{{ url("/") }}'; 
    var type = "addCharge";
    var proOrForId = 0;
    $('#clientDiv').hide();

    function getSelectedValue(e) {
        proOrForId = e.value;
        changePage();
    }

    function changePage() {
        $('#formProduit').attr('action', url + '/produits/add/' + proOrForId + '/' + type);
    }

    function checkRecette() {
        $('#type option:gt(0)').remove();
        $("#type").append('<option value="Explotation">Explotation</option>');
        $("#type").append('<option value="Financière">Financière</option>');
        $("#type").append('<option value="Non courante">Non courante</option>');
        $('#fournisseurDiv').hide();
        $('#clientDiv').show();
        type = "addRecette";
        changePage();
    }
    function checkCharge() {
        $('#type option:gt(0)').remove();
        $("#type").append('<option value="Explotation">Explotation</option>');
        $("#type").append('<option value="Financière">Financière</option>');
        $("#type").append('<option value="Non courante">Non courante</option>');
        $('#fournisseurDiv').show();
        $('#clientDiv').hide();
        type = "addCharge";
        changePage();
    }
</script>

@endsection