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
                                    <input list="types" name="type" class="form-control border-input" id="type" placeholder="Type..."/>
                                    <datalist id="types">
                                        <option value="Produits d'exploitation"></option>
                                        <option value="Produits financiers"></option>
                                        <option value="Produits non courants"></option>
                                        <option value="Ventes de marchandises"></option>
                                        <option value="Ventes de biens et services produits"></option>
                                        <option value="Variations des stocks des produits"></option>
                                        <option value="Immobilisations produits par l'entreprise pour elle-même"></option>
                                        <option value="Subventions d'exploitation"></option>
                                        <option value="Autres produits d'exploitation"></option>
                                        <option value="Reprises d'exploitation ; Transfert de change"></option>
                                        <option value="Produits des titres de participation et des autres titres immobilisés"></option>
                                        <option value="Gains de change"></option>
                                        <option value="Intérêts et autres produits financiers"></option>
                                        <option value="Reprises financières ; Transfert de change"></option>
                                        <option value="Produits des cessions des immobilisations"></option>
                                        <option value="Subventions d'équilibre"></option>
                                        <option value="Reprises sur subventions d'investissement"></option>
                                        <option value="Autres produits non courants"></option>
                                        <option value="Reprises non courantes ; Transfert de change"></option>
                                        <option value="Ventes de marchandises au Maroc"></option>
                                        <option value="Ventes de marchandises à l'étranger"></option>
                                        <option value="Ventes de marchandises des exercices antérieurs"></option>
                                        <option value="Rabais, remises et ristournes accordés par l'entreprise"></option>
                                        <option value="Ventes de biens et services produits au Maroc"></option>
                                        <option value="Ventes de biens produits à l'étranger"></option>
                                        <option value="Ventes de services produits au Maroc"></option>
                                        <option value="Ventes de services produits à l'étranger"></option>
                                        <option value="Redevances pour brevets, marques, droits et valeurs similaires"></option>
                                        <option value="Ventes de produits accessoires"></option>
                                        <option value="Ventes de biens set services produits des exercices antérieurs"></option>
                                        <option value="Rabais, remises et ristournes accordés par l'entreprise"></option>
                                        <option value="Variations des stocks des produits en cours"></option>
                                        <option value="Variations des stocks de biens produits"></option>
                                        <option value="Variations des stocks de services en cours"></option>
                                        <option value="Immobilisations en non-valeurs produites"></option>
                                        <option value="Immobilisations incorporelles produites"></option>
                                        <option value="Immobilisations corporelles produites"></option>
                                        <option value="Immobilisations produites des exercices antérieurs"></option>
                                        <option value="Subventions d'exploitation reçues de l'exercice"></option>
                                        <option value="Subventions d'exploitation reçues des exercices antérieurs"></option>
                                        <option value="Jetons de présence reçus"></option>
                                        <option value="Revenus des immeubles non affectées à l'exploitation"></option>
                                        <option value="Profits sur opérations faites en commun"></option>
                                        <option value="Transferts de profits sur opérations faites en commun"></option>
                                        <option value="Autres produits d'exploitation des exercices antérieurs"></option>
                                        <option value="Reprises sur amortissements de l'immobilisation en non-valeur"></option>
                                        <option value="Reprises sur amortissements des immobilisations incorporelles"></option>
                                        <option value="Reprises sur amortissements des immobilisations corporelles"></option>
                                        <option value="Reprises sur provisions pour dépréciation des immobilisations"></option>
                                        <option value="Reprises sur provisions pour dépréciation de l'actif circulant"></option>
                                        <option value="Transfert de charges d'exploitation"></option>
                                    </datalist>
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
    var typeP = "addCharge";
    var proOrForId = 0;
    $('#clientDiv').hide();
    $('#fournisseurDiv').show();

    function getSelectedValue(e) {
        alert(typeP);
        proOrForId = e.value;
        changePage();
    }

    function changePage() {
        $('#formProduit').attr('action', url + '/produits/add/' + proOrForId + '/' + typeP);
    }

    function checkRecette() {
        typeP = "addRecette";
        $('#type').val('');
        $("#types option").remove();
        $("#types").append('<option value="Produits d\'exploitation"></option>');
        $("#types").append('<option value="Produits financiers"></option>');
        $("#types").append('<option value="Produits non courants"></option>');
        $("#types").append('<option value="Ventes de marchandises"></option>');
        $("#types").append('<option value="Ventes de biens et services produits"></option>');
        $("#types").append('<option value="Variations des stocks des produits"></option>');
        $("#types").append('<option value="Immobilisations produits par l\'entreprise pour elle-même"></option>');
        $("#types").append('<option value="Subventions d\'exploitation"></option>');
        $("#types").append('<option value="Autres produits d\'exploitation"></option>');
        $("#types").append('<option value="Reprises d\'exploitation ; Transfert de change"></option>');
        $("#types").append('<option value="Produits des titres de participation et des autres titres immobilisés"></option>');
        $("#types").append('<option value="Gains de change"></option>');
        $("#types").append('<option value="Intérêts et autres produits financiers"></option>');
        $("#types").append('<option value="Reprises financières ; Transfert de change"></option>');
        $("#types").append('<option value="Produits des cessions des immobilisations"></option>');
        $("#types").append('<option value="Subventions d\'équilibre"></option>');
        $("#types").append('<option value="Reprises sur subventions d\'investissement"></option>');
        $("#types").append('<option value="Autres produits non courants"></option>');
        $("#types").append('<option value="Reprises non courantes ; Transfert de change"></option>');
        $("#types").append('<option value="Ventes de marchandises au Maroc"></option>');
        $("#types").append('<option value="Ventes de marchandises à l\'étranger"></option>');
        $("#types").append('<option value="Ventes de marchandises des exercices antérieurs"></option>');
        $("#types").append('<option value="Rabais, remises et ristournes accordés par l\'entreprise"></option>');
        $("#types").append('<option value="Ventes de biens et services produits au Maroc"></option>');
        $("#types").append('<option value="Ventes de biens produits à l\'étranger"></option>');
        $("#types").append('<option value="Ventes de services produits au Maroc"></option>');
        $("#types").append('<option value="Ventes de services produits à l\'étranger"></option>');
        $("#types").append('<option value="Redevances pour brevets, marques, droits et valeurs similaires"></option>');
        $("#types").append('<option value="Ventes de produits accessoires"></option>');
        $("#types").append('<option value="Ventes de biens set services produits des exercices antérieurs"></option>');
        $("#types").append('<option value="Rabais, remises et ristournes accordés par l\'entreprise"></option>');
        $("#types").append('<option value="Variations des stocks des produits en cours"></option>');
        $("#types").append('<option value="Variations des stocks de biens produits"></option>');
        $("#types").append('<option value="Variations des stocks de services en cours"></option>');
        $("#types").append('<option value="Immobilisations en non-valeurs produites"></option>');
        $("#types").append('<option value="Immobilisations incorporelles produites"></option>');
        $("#types").append('<option value="Immobilisations corporelles produites"></option>');
        $("#types").append('<option value="Immobilisations produites des exercices antérieurs"></option>');
        $("#types").append('<option value="Subventions d\'exploitation reçues de l\'exercice"></option>');
        $("#types").append('<option value="Subventions d\'exploitation reçues des exercices antérieurs"></option>');
        $("#types").append('<option value="Jetons de présence reçus"></option>');
        $("#types").append('<option value="Revenus des immeubles non affectées à l\'exploitation"></option>');
        $("#types").append('<option value="Profits sur opérations faites en commun"></option>');
        $("#types").append('<option value="Transferts de profits sur opérations faites en commun"></option>');
        $("#types").append('<option value="Autres produits d\'exploitation des exercices antérieurs"></option>');
        $("#types").append('<option value="Reprises sur amortissements de l\'immobilisation en non-valeur"></option>');
        $("#types").append('<option value="Reprises sur amortissements des immobilisations incorporelles"></option>');
        $("#types").append('<option value="Reprises sur amortissements des immobilisations corporelles"></option>');
        $("#types").append('<option value="Reprises sur provisions pour dépréciation des immobilisations"></option>');
        $("#types").append('<option value="Reprises sur provisions pour dépréciation de l\'actif circulant"></option>');
        $("#types").append('<option value="Transfert de charges d\'exploitation"></option>');
        $('#fournisseurDiv').hide();
        $('#clientDiv').show();
        changePage();
    }
    function checkCharge() {
        typeP = "addCharge";
        
        $('#type').val('');
        $("#types option").remove();
        $("#types").append('<option value="Produits d\'exploitation"></option>');
        $("#types").append('<option value="Charges de personnel"></option>');
        $("#types").append('<option value="Impôts et taxes"></option>');
        $("#types").append('<option value="Autres charges d\'exploitation"></option>');
        $("#types").append('<option value="Dotation d\'exploitation"></option>');
        $("#types").append('<option value="Charges d\'intérêt"></option>');
        $("#types").append('<option value="Pertes de change"></option>');
        $("#types").append('<option value="Autres charges financières"></option>');
        $("#types").append('<option value="Dotations financières"></option>');
        $("#types").append('<option value="Valeurs nettes d\'amortissements des immobilisations cédées"></option>');
        $("#types").append('<option value="Subventions accordées"></option>');
        $("#types").append('<option value="Autres charges non courantes"></option>');
        $("#types").append('<option value="Dotations pour courantes"></option>');
        $("#types").append('<option value="Achats revendus de marchandises des exercices antérieurs"></option>');
        $("#types").append('<option value="Impôts sur le résultats"></option>');
        $("#types").append('<option value="Variation des stocks de marchandises"></option>');
        $("#types").append('<option value="Rabais, remises, et ristournes obtenus sur achats de marchandises"></option>');
        $("#types").append('<option value="Achats de marchandises (Groupe A)"></option>');
        $("#types").append('<option value="Achats de marchandises (Groupe B)"></option>');
        $("#types").append('<option value="Achats de matières premières"></option>');
        $("#types").append('<option value="Achats de matières et fournitures consommables"></option>');
        $("#types").append('<option value="Achats d\'emballages"></option>');
        $("#types").append('<option value="Variation des stocks de matières et fournitures"></option>');

        $("#types").append('<option value="Achats non stockés de matières et fournitures"></option>');

        $("#types").append('<option value="Achats de travaux, études et prestations de services"></option>');
        $("#types").append('<option value="Achats des matières et des fournitures des exercices antérieurs"></option>');
        $("#types").append('<option value="Rabais, remises, et ristournes obtenus sur achats consommés de matières et fournitures"></option>');

        $("#types").append('<option value="Locations et charges locatives"></option>');
        $("#types").append('<option value="Redevances de crédit bail"></option>');
        $("#types").append('<option value="Entretien et réparations"></option>');
        $("#types").append('<option value="Primes d\'assurance"></option>');
        $("#types").append('<option value="Rémunérations du personnel extérieurs à l\'entreprise"></option>');
        $("#types").append('<option value="Rémunérations d\'intermédiaires et honoraires"></option>');
        $("#types").append('<option value="Redevances pour brevets, marques, droits et valeurs similaires"></option>');
        $("#types").append('<option value="Etudes, recherches et documentation"></option>');
        $("#types").append('<option value="Transport"></option>');
        $("#types").append('<option value="Déplacements, missions et réceptions"></option>');
        $("#types").append('<option value=" Publicité, publications et relations publiques"></option>');
        $("#types").append('<option value=" Frais postaux et frais de télécommunication"></option>');
        $("#types").append('<option value="Cotisations et dons"></option>');
        $("#types").append('<option value="Services bancaires"></option>');
        $("#types").append('<option value="Autres charges externes des exercices antérieurs"></option>');
        $("#types").append('<option value="Rabais, remises et ristournes obtenus sur autres charges externes"></option>');
        $("#types").append('<option value="Impôts et taxes directs"></option>');
        $("#types").append('<option value="Impôts et taxes indirects"></option>');
        $("#types").append('<option value="Impôts, taxes et droits assimilés"></option>');
        $("#types").append('<option value="Impôts et taxes des exercices antérieurs"></option>');
        $("#types").append('<option value="Rémunération du personnel"></option>');
        $("#types").append('<option value="Charges sociales diverses"></option>');
        $("#types").append('<option value="charges sociales"></option>');
        $("#types").append('<option value="Charges sociales diverses"></option>');
        $("#types").append('<option value="Rémunération de l\'exploitant"></option>');
        $("#types").append('<option value="Charges de personnel des exercices antérieurs"></option>');
        $("#types").append('<option value="Jetons de présence"></option>');
        $("#types").append('<option value="Pertes sur créances irrécouvrables"></option>');
        $("#types").append('<option value="Pertes sur opérations faites en commun"></option>');
        $("#types").append('<option value="Transferts de profits sur opérations faites en commun"></option>');
        $("#types").append('<option value="Autres charges d\'exploitation des exercices antérieurs"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements des immobilisations corporelles"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour risques et charges"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation des immobilisations"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant"></option>');
        $("#types").append('<option value="Dotations d\'exploitation des exercices antérieurs"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux amortissements des immobilisations corporelles"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation des immobilisations"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour risques et charges"></option>');
        $("#types").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant"></option>');
        $("#types").append('<option value="Dotations d\'exploitation des exercices antérieurs"></option>');
        $("#types").append('<option value="Pertes de change propres à l\'exercice"></option>');
        $("#types").append('<option value="Pertes de change des exercices antérieurs"></option>');
        $("#types").append('<option value="Pertes sur créances liées à des participations"></option>');
        $("#types").append('<option value="Charges nettes sur cessions de titres et valeurs de placement"></option>');
        $("#types").append('<option value="Escomptes accordés"></option>');
        $("#types").append('<option value="Autres charges financières des exercices antérieurs"></option>');
        $("#types").append('<option value="Dotations aux amortissements des primes de remboursement des obligations"></option>');
        $("#types").append('<option value="Dotations aux provisions pour dépréciation des immobilisations financières"></option>');
        $("#types").append('<option value="Dotations aux provisions pour risques et charges financières"></option>');
        $("#types").append('<option value="Dotations aux provisions pour dépréciation des titres et valeurs de placement"></option>');
        $("#types").append('<option value="Dotations aux provisions pour dépréciation des comptes de trésorerie"></option>');
        $("#types").append('<option value="Valeurs nettes d\'amortissement des immobilisations incorporelles cédées"></option>');
        $("#types").append('<option value="Dotations financières des exercices antérieurs"></option>');
        $("#types").append('<option value="Valeurs nettes d\'amortissement des immobilisations corporelles cédées"></option>');
        $("#types").append('<option value="Valeurs nettes d\'amortissement des immobilisations financières cédées"></option>');
        $("#types").append('<option value="Valeurs nettes d\'amortissement des immobilisations cédées des exercices antérieurs"></option>');
        $("#types").append('<option value="Subventions accordées de l\'exercice"></option>');
        $("#types").append('<option value="Pénalités sur marchés et dédits"></option>');
        $("#types").append('<option value="Subventions accordées des exercices antérieurs"></option>');
        $("#types").append('<option value="Rappels d\'impôts autres qu\'impôts sur les résultats"></option>');
        $("#types").append('<option value="Pénalités et amendes fiscales ou pénales"></option>');
        $("#types").append('<option value="Créances devenues irrécouvrables"></option>');
        $("#types").append('<option value="Dons, libéralités et lots"></option>');
        $("#types").append('<option value="Autres charges non courantes des exercices antérieurs"></option>');
        $("#types").append('<option value="Dotations aux amortissements exceptionnels des immobilisations"></option>');
        $("#types").append('<option value="Dotations non courantes aux provisions réglementées"></option>');
        $("#types").append('<option value="Dotations non courantes aux provisions pour dépréciation"></option>');
        $("#types").append('<option value="Dotations non courantes aux provisions pour risques et charges"></option>');
        $("#types").append('<option value="Dotations non courantes des exercices antérieurs"></option>');
        $("#types").append('<option value="Imposition minimale annuelle des sociétés"></option>');
        $("#types").append('<option value="Rappels et dégrèvements des impôts sur les résultats"></option>');
        $('#fournisseurDiv').show();
        $('#clientDiv').hide();
        changePage();
    }
</script>

@endsection