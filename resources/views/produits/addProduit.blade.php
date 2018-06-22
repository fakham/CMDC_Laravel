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
                                    <select name="type" class="form-control border-input" id="type"/>
                                        
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
    var typeP = "addCharge";
    var proOrForId = 0;

    checkCharge();

    function getSelectedValue(e) {
        proOrForId = e.value;
        changePage();
    }

    function changePage() {
        $('#formProduit').attr('action', url + '/produits/add/' + proOrForId + '/' + typeP);
    }

    function checkRecette() {
        typeP = "addRecette";
        $('#type').val('');
        $("#type option").remove();
        
        $('#type').append('<option value="" selected disabled>Type...</option>');
        $('#type').append('<option value="Produits d\'exploitation">Produits d\'exploitation</option>');
        $('#type').append('<option value="Produits financiers">Produits financiers</option>');
        $('#type').append('<option value="Produits non courants">Produits non courants</option>');
        $('#type').append('<option value="Ventes de marchandises">Ventes de marchandises</option>');
        $('#type').append('<option value="Ventes de biens et services produits">Ventes de biens et services produits</option>');
        $('#type').append('<option value="Variations des stocks des produits">Variations des stocks des produits</option>');
        $('#type').append('<option value="Immobilisations produits par l\'entreprise pour elle-même">Immobilisations produits par l\'entreprise pour elle-même</option>');
        $('#type').append('<option value="Subventions d\'exploitation">Subventions d\'exploitation</option>');
        $('#type').append('<option value="Autres produits d\'exploitation">Autres produits d\'exploitation</option>');
        $('#type').append('<option value="Reprises d\'exploitation ; Transfert de change">Reprises d\'exploitation ; Transfert de change</option>');
        $('#type').append('<option value="Produits des titres de participation et des autres titres immobilisés">Produits des titres de participation et des autres titres immobilisés</option>');
        $('#type').append('<option value="Gains de change">Gains de change</option>');
        $('#type').append('<option value="Intérêts et autres produits financiers">Intérêts et autres produits financiers</option>');
        $('#type').append('<option value="Reprises financières ; Transfert de change">Reprises financières ; Transfert de change</option>');
        $('#type').append('<option value="Produits des cessions des immobilisations">Produits des cessions des immobilisations</option>');
        $('#type').append('<option value="Subventions d\'équilibre">Subventions d\'équilibre</option>');
        $('#type').append('<option value="Reprises sur subventions d\'investissement">Reprises sur subventions d\'investissement</option>');
        $('#type').append('<option value="Autres produits non courants">Autres produits non courants</option>');
        $('#type').append('<option value="Reprises non courantes ; Transfert de change">Reprises non courantes ; Transfert de change</option>');
        $('#type').append('<option value="Ventes de marchandises au Maroc">Ventes de marchandises au Maroc</option>');
        $('#type').append('<option value="Ventes de marchandises à l\'étranger">Ventes de marchandises à l\'étranger</option>');
        $('#type').append('<option value="Ventes de marchandises des exercices antérieurs">Ventes de marchandises des exercices antérieurs</option>');
        $('#type').append('<option value="Rabais, remises et ristournes accordés par l\'entreprise">Rabais, remises et ristournes accordés par l\'entreprise</option>');
        $('#type').append('<option value="Ventes de biens et services produits au Maroc">Ventes de biens et services produits au Maroc</option>');
        $('#type').append('<option value="Ventes de biens produits à l\'étranger">Ventes de biens produits à l\'étranger</option>');
        $('#type').append('<option value="Ventes de services produits au Maroc">Ventes de services produits au Maroc</option>');
        $('#type').append('<option value="Ventes de services produits à l\'étranger">Ventes de services produits à l\'étranger</option>');
        $('#type').append('<option value="Redevances pour brevets, marques, droits et valeurs similaires">Redevances pour brevets, marques, droits et valeurs similaires</option>');
        $('#type').append('<option value="Ventes de produits accessoires">Ventes de produits accessoires</option>');
        $('#type').append('<option value="Ventes de biens set services produits des exercices antérieurs">Ventes de biens set services produits des exercices antérieurs</option>');
        $('#type').append('<option value="Rabais, remises et ristournes accordés par l\'entreprise">Rabais, remises et ristournes accordés par l\'entreprise</option>');
        $('#type').append('<option value="Variations des stocks des produits en cours">Variations des stocks des produits en cours</option>');
        $('#type').append('<option value="Variations des stocks de biens produits">Variations des stocks de biens produits</option>');
        $('#type').append('<option value="Variations des stocks de services en cours">Variations des stocks de services en cours</option>');
        $('#type').append('<option value="Immobilisations en non-valeurs produites">Immobilisations en non-valeurs produites</option>');
        $('#type').append('<option value="Immobilisations incorporelles produites">Immobilisations incorporelles produites</option>');
        $('#type').append('<option value="Immobilisations corporelles produites">Immobilisations corporelles produites</option>');
        $('#type').append('<option value="Immobilisations produites des exercices antérieurs">Immobilisations produites des exercices antérieurs</option>');
        $('#type').append('<option value="Subventions d\'exploitation reçues de l\'exercice">Subventions d\'exploitation reçues de l\'exercice</option>');
        $('#type').append('<option value="Subventions d\'exploitation reçues des exercices antérieurs">Subventions d\'exploitation reçues des exercices antérieurs</option>');
        $('#type').append('<option value="Jetons de présence reçus">Jetons de présence reçus</option>');
        $('#type').append('<option value="Revenus des immeubles non affectées à l\'exploitation">Revenus des immeubles non affectées à l\'exploitation</option>');
        $('#type').append('<option value="Profits sur opérations faites en commun">Profits sur opérations faites en commun</option>');
        $('#type').append('<option value="Transferts de profits sur opérations faites en commun">Transferts de profits sur opérations faites en commun</option>');
        $('#type').append('<option value="Autres produits d\'exploitation des exercices antérieurs">Autres produits d\'exploitation des exercices antérieurs</option>');
        $('#type').append('<option value="Reprises sur amortissements de l\'immobilisation en non-valeur">Reprises sur amortissements de l\'immobilisation en non-valeur</option>');
        $('#type').append('<option value="Reprises sur amortissements des immobilisations incorporelles">Reprises sur amortissements des immobilisations incorporelles</option>');
        $('#type').append('<option value="Reprises sur amortissements des immobilisations corporelles">Reprises sur amortissements des immobilisations corporelles</option>');
        $('#type').append('<option value="Reprises sur provisions pour dépréciation des immobilisations">Reprises sur provisions pour dépréciation des immobilisations</option>');
        $('#type').append('<option value="Reprises sur provisions pour dépréciation de l\'actif circulant">Reprises sur provisions pour dépréciation de l\'actif circulant</option>');
        $('#type').append('<option value="Transfert de charges d\'exploitation">Transfert de charges d\'exploitation</option>');

        $('#fournisseurDiv').hide();
        $('#clientDiv').show();
        changePage();
    }
    function checkCharge() {
        typeP = "addCharge";
        
        $('#type').val('');
        $("#type option").remove();
        
        $('#type').append('<option value="" selected disabled>Type...</option>');
        $("#type").append('<option value="Produits d\'exploitation">Produits d\'exploitation</option>');
        $("#type").append('<option value="Charges de personnel">Charges de personnel</option>');
        $("#type").append('<option value="Impôts et taxes">Impôts et taxes</option>');
        $("#type").append('<option value="Autres charges d\'exploitation">Autres charges d\'exploitation</option>');
        $("#type").append('<option value="Dotation d\'exploitation">Dotation d\'exploitation</option>');
        $("#type").append('<option value="Charges d\'intérêt">Charges d\'intérêt</option>');
        $("#type").append('<option value="Pertes de change">Pertes de change</option>');
        $("#type").append('<option value="Autres charges financières">Autres charges financières</option>');
        $("#type").append('<option value="Dotations financières">Dotations financières</option>');
        $("#type").append('<option value="Valeurs nettes d\'amortissements des immobilisations cédées">Valeurs nettes d\'amortissements des immobilisations cédées</option>');
        $("#type").append('<option value="Subventions accordées">Subventions accordées</option>');
        $("#type").append('<option value="Autres charges non courantes">Autres charges non courantes</option>');
        $("#type").append('<option value="Dotations pour courantes">Dotations pour courantes</option>');
        $("#type").append('<option value="Achats revendus de marchandises des exercices antérieurs">Achats revendus de marchandises des exercices antérieurs</option>');
        $("#type").append('<option value="Impôts sur le résultats">Impôts sur le résultats</option>');
        $("#type").append('<option value="Variation des stocks de marchandises">Variation des stocks de marchandises</option>');
        $("#type").append('<option value="Rabais, remises, et ristournes obtenus sur achats de marchandises">Rabais, remises, et ristournes obtenus sur achats de marchandises</option>');
        $("#type").append('<option value="Achats de marchandises (Groupe A)">Achats de marchandises (Groupe A)</option>');
        $("#type").append('<option value="Achats de marchandises (Groupe B)">Achats de marchandises (Groupe B)</option>');
        $("#type").append('<option value="Achats de matières premières">Achats de matières premières</option>');
        $("#type").append('<option value="Achats de matières et fournitures consommables">Achats de matières et fournitures consommables</option>');
        $("#type").append('<option value="Achats d\'emballages">Achats d\'emballages</option>');
        $("#type").append('<option value="Variation des stocks de matières et fournitures">Variation des stocks de matières et fournitures</option>');

        $("#type").append('<option value="Achats non stockés de matières et fournitures">Achats non stockés de matières et fournitures</option>');

        $("#type").append('<option value="Achats de travaux, études et prestations de services">Achats de travaux, études et prestations de services</option>');
        $("#type").append('<option value="Achats des matières et des fournitures des exercices antérieurs">Achats des matières et des fournitures des exercices antérieurs</option>');
        $("#type").append('<option value="Rabais, remises, et ristournes obtenus sur achats consommés de matières et fournitures">Rabais, remises, et ristournes obtenus sur achats consommés de matières et fournitures</option>');

        $("#type").append('<option value="Locations et charges locatives">Locations et charges locatives</option>');
        $("#type").append('<option value="Redevances de crédit bail">Redevances de crédit bail</option>');
        $("#type").append('<option value="Entretien et réparations">Entretien et réparations</option>');
        $("#type").append('<option value="Primes d\'assurance">Primes d\'assurance</option>');
        $("#type").append('<option value="Rémunérations du personnel extérieurs à l\'entreprise">Rémunérations du personnel extérieurs à l\'entreprise</option>');
        $("#type").append('<option value="Rémunérations d\'intermédiaires et honoraires">Rémunérations d\'intermédiaires et honoraires</option>');
        $("#type").append('<option value="Redevances pour brevets, marques, droits et valeurs similaires">Redevances pour brevets, marques, droits et valeurs similaires</option>');
        $("#type").append('<option value="Etudes, recherches et documentation">Etudes, recherches et documentation</option>');
        $("#type").append('<option value="Transport">Transport</option>');
        $("#type").append('<option value="Déplacements, missions et réceptions">Déplacements, missions et réceptions</option>');
        $("#type").append('<option value="Publicité, publications et relations publiques">Publicité, publications et relations publiques</option>');
        $("#type").append('<option value="Frais postaux et frais de télécommunication">Frais postaux et frais de télécommunication</option>');
        $("#type").append('<option value="Cotisations et dons">Cotisations et dons</option>');
        $("#type").append('<option value="Services bancaires">Services bancaires</option>');
        $("#type").append('<option value="Autres charges externes des exercices antérieurs">Autres charges externes des exercices antérieurs</option>');
        $("#type").append('<option value="Rabais, remises et ristournes obtenus sur autres charges externes">Rabais, remises et ristournes obtenus sur autres charges externes</option>');
        $("#type").append('<option value="Impôts et taxes directs">Impôts et taxes directs</option>');
        $("#type").append('<option value="Impôts et taxes indirects">Impôts et taxes indirects</option>');
        $("#type").append('<option value="Impôts, taxes et droits assimilés">Impôts, taxes et droits assimilés</option>');
        $("#type").append('<option value="Impôts et taxes des exercices antérieurs">Impôts et taxes des exercices antérieurs</option>');
        $("#type").append('<option value="Rémunération du personnel">Rémunération du personnel</option>');
        $("#type").append('<option value="Charges sociales diverses">Charges sociales diverses</option>');
        $("#type").append('<option value="charges sociales">charges sociales</option>');
        $("#type").append('<option value="Charges sociales diverses">Charges sociales diverses</option>');
        $("#type").append('<option value="Rémunération de l\'exploitant">Rémunération de l\'exploitant</option>');
        $("#type").append('<option value="Charges de personnel des exercices antérieurs">Charges de personnel des exercices antérieurs</option>');
        $("#type").append('<option value="Jetons de présence">Jetons de présence</option>');
        $("#type").append('<option value="Pertes sur créances irrécouvrables">Pertes sur créances irrécouvrables</option>');
        $("#type").append('<option value="Pertes sur opérations faites en commun">Pertes sur opérations faites en commun</option>');
        $("#type").append('<option value="Transferts de profits sur opérations faites en commun">Transferts de profits sur opérations faites en commun</option>');
        $("#type").append('<option value="Autres charges d\'exploitation des exercices antérieurs">Autres charges d\'exploitation des exercices antérieurs</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs">Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles">Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements des immobilisations corporelles">Dotations d\'exploitation aux amortissements des immobilisations corporelles</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour risques et charges">Dotations d\'exploitation aux provisions pour risques et charges</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation des immobilisations">Dotations d\'exploitation aux provisions pour dépréciation des immobilisations</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant">Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant</option>');
        $("#type").append('<option value="Dotations d\'exploitation des exercices antérieurs">Dotations d\'exploitation des exercices antérieurs</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs">Dotations d\'exploitation aux amortissements de l\'immobilisation en non-valeurs</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles">Dotations d\'exploitation aux amortissements de l\'immobilisation incorporelles</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux amortissements des immobilisations corporelles">Dotations d\'exploitation aux amortissements des immobilisations corporelles</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation des immobilisations">Dotations d\'exploitation aux provisions pour dépréciation des immobilisations</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour risques et charges">Dotations d\'exploitation aux provisions pour risques et charges</option>');
        $("#type").append('<option value="Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant">Dotations d\'exploitation aux provisions pour dépréciation de l\'actif circulant</option>');
        $("#type").append('<option value="Dotations d\'exploitation des exercices antérieurs">Dotations d\'exploitation des exercices antérieurs</option>');
        $("#type").append('<option value="Pertes de change propres à l\'exercice">Pertes de change propres à l\'exercice</option>');
        $("#type").append('<option value="Pertes de change des exercices antérieurs">Pertes de change des exercices antérieurs</option>');
        $("#type").append('<option value="Pertes sur créances liées à des participations">Pertes sur créances liées à des participations</option>');
        $("#type").append('<option value="Charges nettes sur cessions de titres et valeurs de placement">Charges nettes sur cessions de titres et valeurs de placement</option>');
        $("#type").append('<option value="Escomptes accordés">Escomptes accordés</option>');
        $("#type").append('<option value="Autres charges financières des exercices antérieurs">Autres charges financières des exercices antérieurs</option>');
        $("#type").append('<option value="Dotations aux amortissements des primes de remboursement des obligations">Dotations aux amortissements des primes de remboursement des obligations</option>');
        $("#type").append('<option value="Dotations aux provisions pour dépréciation des immobilisations financières">Dotations aux provisions pour dépréciation des immobilisations financières</option>');
        $("#type").append('<option value="Dotations aux provisions pour risques et charges financières">Dotations aux provisions pour risques et charges financières</option>');
        $("#type").append('<option value="Dotations aux provisions pour dépréciation des titres et valeurs de placement">Dotations aux provisions pour dépréciation des titres et valeurs de placement</option>');
        $("#type").append('<option value="Dotations aux provisions pour dépréciation des comptes de trésorerie">Dotations aux provisions pour dépréciation des comptes de trésorerie</option>');
        $("#type").append('<option value="Valeurs nettes d\'amortissement des immobilisations incorporelles cédées">Valeurs nettes d\'amortissement des immobilisations incorporelles cédées</option>');
        $("#type").append('<option value="Dotations financières des exercices antérieurs">Dotations financières des exercices antérieurs</option>');
        $("#type").append('<option value="Valeurs nettes d\'amortissement des immobilisations corporelles cédées">Valeurs nettes d\'amortissement des immobilisations corporelles cédées</option>');
        $("#type").append('<option value="Valeurs nettes d\'amortissement des immobilisations financières cédées">Valeurs nettes d\'amortissement des immobilisations financières cédées</option>');
        $("#type").append('<option value="Valeurs nettes d\'amortissement des immobilisations cédées des exercices antérieurs">Valeurs nettes d\'amortissement des immobilisations cédées des exercices antérieurs</option>');
        $("#type").append('<option value="Subventions accordées de l\'exercice">Subventions accordées de l\'exercice</option>');
        $("#type").append('<option value="Pénalités sur marchés et dédits">Pénalités sur marchés et dédits</option>');
        $("#type").append('<option value="Subventions accordées des exercices antérieurs">Subventions accordées des exercices antérieurs</option>');
        $("#type").append('<option value="Rappels d\'impôts autres qu\'impôts sur les résultats">Rappels d\'impôts autres qu\'impôts sur les résultats</option>');
        $("#type").append('<option value="Pénalités et amendes fiscales ou pénales">Pénalités et amendes fiscales ou pénales</option>');
        $("#type").append('<option value="Créances devenues irrécouvrables">Créances devenues irrécouvrables</option>');
        $("#type").append('<option value="Dons, libéralités et lots">Dons, libéralités et lots</option>');
        $("#type").append('<option value="Autres charges non courantes des exercices antérieurs">Autres charges non courantes des exercices antérieurs</option>');
        $("#type").append('<option value="Dotations aux amortissements exceptionnels des immobilisations">Dotations aux amortissements exceptionnels des immobilisations</option>');
        $("#type").append('<option value="Dotations non courantes aux provisions réglementées">Dotations non courantes aux provisions réglementées</option>');
        $("#type").append('<option value="Dotations non courantes aux provisions pour dépréciation">Dotations non courantes aux provisions pour dépréciation</option>');
        $("#type").append('<option value="Dotations non courantes aux provisions pour risques et charges">Dotations non courantes aux provisions pour risques et charges</option>');
        $("#type").append('<option value="Dotations non courantes des exercices antérieurs">Dotations non courantes des exercices antérieurs</option>');
        $("#type").append('<option value="Imposition minimale annuelle des sociétés">Imposition minimale annuelle des sociétés</option>');
        $("#type").append('<option value="Rappels et dégrèvements des impôts sur les résultats">Rappels et dégrèvements des impôts sur les résultats</option>');

        $('#fournisseurDiv').show();
        $('#clientDiv').hide();
        changePage();

    }
</script>

@endsection