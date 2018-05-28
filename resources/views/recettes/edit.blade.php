@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title"><b>Modifier recette</b></h4>
                </div>
                <div class="content">
                    <form method="POST" action="/recettes/{{$recette->id}}/update">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Produit</label>
                                    <select name="produit_id" class="form-control border-input">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client_id" class="form-control border-input">
                                        <option value="" disabled selected>Client..</option>
                                        @foreach ($clients as $client)
                                            @if ($client->id == $recette->client_id)
                                            <option value="{{ $client->id }}" selected>{{ $client->nom }}</option>
                                            @else
                                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' class="form-control border-input" name="date" value="{{ $recette->date }}" placeholder="Date..." onclick="(this.type='date')"/>
                                        <span class="input-group-addon ">
                                        <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prix unitaire</label>
                                    <input name="prix" type="number" id="price" class="form-control border-input" value="{{ $recette->prix }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantité</label>
                                    <input name="qtte" type="number" id="qty" class="form-control border-input" value="{{ $recette->qtte }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Prix total</label>
                                    <input type="text" id="total" disabled="true" class="form-control border-input" placeholder="*******">
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-wd">Ajouter</button>
                            <a class="btn btn-danger btn-wd" href="/recettes">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    document.getElementById("activeProfile").classList.remove('active');
    document.getElementById("activeDashboard").classList.remove('active');
    document.getElementById("activeCharge").classList.remove('active');
    document.getElementById("activeRecette").classList.add('active');
    document.getElementById("activeProgramme").classList.remove('active');

    document.getElementById("total").disable = true;
    $('#qty').on('keyup', function() {
        $('#total').val($('#qty').val() * $('#price').val());
    });
    $('#total').val($('#qty').val() * $('#price').val());
</script>


@endsection
