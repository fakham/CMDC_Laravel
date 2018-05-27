@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title"><b>Ajouter une nouvelle charge</b></h4>
                </div>
                <div class="content">
                    <form method="POST" action="/charges/add/store">
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
                                    <label>Fournisseur</label>
                                    <select name="fournisseur" class="form-control border-input">
                                        <option value="" disabled selected>Fournisseur..</option>
                                        @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker6'>
                                        <input type='date' onclick="(this.type='date')" class="form-control border-input" name="date"/>
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
                                    <input type="number" name="prix" id="price" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantité</label>
                                    <input type="number" id="qty" name="qtte" class="form-control border-input">
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
                            <a type="button" href="/charges" class="btn btn-danger btn-wd">Annuler</a>
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
    document.getElementById("activeCharge").classList.add('active');
    document.getElementById("activeRecette").classList.remove('active');
    document.getElementById("activeProgramme").classList.remove('active');
    
document.getElementById("total").disable=true;
    $('#qty').on('keyup', function() {
        $('#total').val($('#qty').val() * $('#price').val());
    });
</script>


@endsection