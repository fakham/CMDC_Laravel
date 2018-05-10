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
    function checkRecette() {
        $('#typeProduit option:gt(0)').remove();
        $("#typeProduit").append('<option value="Recette 1">Recette 1</option>');
        $("#typeProduit").append('<option value="Recette 2">Recette 2</option>');
        $("#typeProduit").append('<option value="Recette 3">Recette 3</option>');
    }
    function checkCharge() {
        $('#typeProduit option:gt(0)').remove();
        $("#typeProduit").append('<option value="Explotation">Explotation</option>');
        $("#typeProduit").append('<option value="Financière">Financière</option>');
        $("#typeProduit").append('<option value="Non courante">Non courante</option>');
    }
</script>

@endsection