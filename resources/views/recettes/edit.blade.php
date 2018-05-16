@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Recette</div>

                <div class="card-body">
                    <form method="POST" action="/recettes/{{$recette->id}}/update">
                    @csrf
                        <div class="input-group">
                            <select name="produit" class="form-control">
                                <option value="" disabled selected>Produit..</option>
                                @foreach ($produits as $produit)
                                    @if ($produit->id == $recette->produit_id)
                                    <option value="{{ $produit->id }}" selected>{{ $produit->nom }}</option>
                                    @else
                                    <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <select name="fournisseur" class="form-control">
                                <option value="" disabled selected>Fournisseur..</option>
                                @foreach ($clients as $client)
                                    @if ($client->id == $recette->client_id)
                                    <option value="{{ $client->id }}" selected>{{ $client->nom }}</option>
                                    @else
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="date" value="{{ $recette->date }}" placeholder="Date..." onclick="(this.type='date')"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="number" name="prix" class="form-control" placeholder="Prix unitaire..." value="{{ $recette->prix }}">
                        <br>
                        <input type="number" name="qtte" class="form-control" placeholder="Quantité..." value="{{ $recette->qtte }}">
                        <br>
                        <div class="input-group-btn">
                            <input type="submit" value="Enregistrer" class="btn btn-default" />
                            <a class="btn btn-danger" href="/recettes">Annuler</a>
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