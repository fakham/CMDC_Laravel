@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title"><b>Ajouter une nouvelle recette</b></h4>
                </div>
                <div class="content">
                    <form method="POST" action="/recettes/add/store">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Produit</label>
                                    <select name="produit" class="form-control border-input">
                                        <option value="" disabled selected>Produit..</option>
                                        @foreach ($produits as $produit)
                                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client" class="form-control border-input">
                                        <option value="" disabled selected>Client..</option>
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker6'>
                                        <input name="date" type='date' onclick="(this.type='date')" class="form-control border-input" />
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
                                    <input name="prix" type="number" id="price" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantité</label>
                                    <input name="qtte" type="number" id="qty" class="form-control border-input">
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

<script type="text/javascript">
    document.getElementById("total").disable = true;
    $('#qty').on('keyup', function() {
        $('#total').val($('#qty').val() * $('#price').val());
    });
</script>


@endsection