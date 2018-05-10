@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouvelle Recette</div>

                <div class="card-body">
                    <div class="input-group">
                        <select name="produit" class="form-control">
                            <option value="" disabled selected>Produit..</option>
                            <option>Produit 1</option>
                            <option>Produit 2</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <select name="client" class="form-control">
                            <option value="" disabled selected>Client..</option>
                            <option>Client 1</option>
                            <option>Client 2</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" placeholder="Date..." onclick="(this.type='date')"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="number" name="prix" class="form-control" placeholder="Prix unitaire...">
                    <br>
                    <input type="number" name="quantite" class="form-control" placeholder="Quantité...">
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
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


@endsection