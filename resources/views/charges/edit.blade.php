@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Charge</div>

                <div class="card-body">
                    <form method="POST" action="/charges/{{$charge->id}}/update">
                    @csrf
                        <div class="input-group">
                            <select name="produit" class="form-control">
                                <option value="" disabled selected>Produit..</option>
                                @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <select name="fournisseur" class="form-control">
                                <option value="" disabled selected>Fournisseur..</option>
                                @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="date" value="{{ $charge->date }}" placeholder="Date..." onclick="(this.type='date')"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="number" name="prix" class="form-control" placeholder="Prix unitaire..." value="{{ $charge->prix }}">
                        <br>
                        <input type="number" name="qtte" class="form-control" placeholder="Quantité..." value="{{ $charge->qtte }}">
                        <br>
                        <div class="input-group-btn">
                            <input type="submit" value="Enregistrer" class="btn btn-default" />
                            <a class="btn btn-danger" href="/charges">Annuler</a>
                        </div>
                    </form>
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