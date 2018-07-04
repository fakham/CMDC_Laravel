@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning  text-center">
                                <i class="ti-pie-chart"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Charges</p>
                                {{ $resultatsCharges }} MAD
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-receipt"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Recette</p>
                                {{ $resultatsRecettes }} MAD
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-view-grid"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Resultat </p>
                                {{ $resultats }} MAD
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                
            </div>
        </div>
    </div>

    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Monthly</h4>
                </div>
                <div class="col-md-4">
                    <input id="datepicker1" type='date' class="form-control border-input" name="date" onchange="changeCharts()"/>
                </div>
                <div class="col-md-4">
                    <input id="datepicker2" type='date' class="form-control border-input" name="date" onchange="changeCharts()"/>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse recettes en chiffre</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="clientChiffreRecette" name="client" class="form-control border-input" onchange="filterClientChiffreRecette()">
                                    <option value="" selected>Client.. (Tous)</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitChiffreRecette" name="client" class="form-control border-input" onchange="filterProduitChiffreRecette()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse charges en chiffre</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="fournisseurChiffreCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurChiffreCharge()">
                                    <option value="" selected>Fournisseur.. (Tous)</option>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitChiffreCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitChiffreCharge()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"></div>
                <div class="content">
                    <canvas id="chart2"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse recettes en quantité</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="clientQuantiteRecette" name="client" class="form-control border-input" onchange="filterClientQuantiteRecette()">
                                    <option value="" selected>Client.. (Tous)</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitQuantiteRecette" name="client" class="form-control border-input" onchange="filterProduitQuantiteRecette()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="chart3"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse charges en quantité</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="fournisseurQuantiteCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurQuantiteCharge()">
                                    <option value="" selected>Fournisseur.. (Tous)</option>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitQuantiteCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitQuantiteCharge()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="chart4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse recettes par prix</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="clientPrixRecette" name="client" class="form-control border-input" onchange="filterClientPrixRecette()">
                                    <option value="" selected>Client.. (Tous)</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitPrixRecette" name="client" class="form-control border-input" onchange="filterProduitPrixRecette()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="canvaPrixRecette"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="title" style="font-size:1em; font-weight:bold">Analyse charges par prix</h4>
                            </div>
                            <div class="col-sm-4">
                                <select id="fournisseurPrixCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurPrixCharge()">
                                    <option value="" selected>Fournisseur.. (Tous)</option>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select id="produitPrixCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitPrixCharge()">
                                    <option value="" selected>Produit..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="canvaPrixCharge"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Structure de charge</h4>
                </div>
                <div class="content">
                    <canvas id="canvaStructure"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Produits les plus vendus</h4>
                </div>
                <div class="content">
                    <table class="table table-striped">
                        <thead>
                            <th><strong>Top 5 produits</strong></th>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Les meilleurs clients</h4>
                </div>
                <div class="content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><strong>Top 10 clients</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topClients as $client)
                            <tr>
                                <td>{{ $client->nom }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<!--<script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script> -->
<script src="{{ asset('/js/moment-with-locales.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script type="text/javascript">

    var color = Chart.helpers.color;

    var chartCanvaStructure = document.getElementById("canvaStructure");
    var chartChiffreRecette = document.getElementById("chart");
    var chartChiffreCharge = document.getElementById("chart2");
    var chartQuantiteRecette = document.getElementById("chart3");
    var chartQuantiteCharge = document.getElementById("chart4");
    var chartPrixCharge = document.getElementById("canvaPrixCharge");
    var chartPrixRecette = document.getElementById("canvaPrixRecette");

    var canvaStructure;
    var canvaChiffreRecette;
    var canvaChiffreCharge;
    var canvaQuantiteRecette;
    var canvaQuantiteCharge;
    var canvaPrixCharge;
    var canvaPrixRecette;

    var configCanvaStructure;
    var configCanvaChiffreRecette;
    var configCanvaChiffreCharge;
    var configCanvaQuantiteRecette;
    var configCanvaQuantiteCharge;
    var configCanvaPrixCharge;
    var configCanvaPrixRecette;

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

	$(document).ready(function() {

		demo.initChartist();

		$.notify({
			icon: 'ti-gift',
			message: "Welcome to <b>CMDC APP</b> "

		}, {
			type: 'success',
			timer: 4000
		});
        
        $.ajax({
               type:'GET',
               url:'/home/structureCharge',
               //data: {'_token:  <?php echo csrf_token() ?>'},
               data: {dateD:'', dateF:''},
               success:function(d){
                  var nombres = [];
                  var types = [];
                  var colors = [];

                  for (var i = 0; i < d.structure.length; i++) {
                      nombres.push(d.structure[i].nombre);
                      types.push(d.structure[i].type);
                      colors.push(getRandomColor());
                  }

                  if (nombres.length == 0) {
                        nombres.push(1);
                        types.push("No results!!");
                        colors.push("#000");
                  } 

                    configCanvaStructure = {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: nombres,
                                backgroundColor: colors,
                                label: 'Dataset 1'
                            }],
                            labels: types
                        },
                        options: {
                            responsive: true
                        }
                    };

                //   console.log(data.structure);
                  canvaStructure = new Chart(chartCanvaStructure, configCanvaStructure);
               }
        });
        
        $.ajax({
               type:'GET',
               url:'/home/chiffreCharge',
               data: {dateD:'', dateF:'', fournisseur:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];

                    var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            if (moment(d.jsonCharges[j].date).isBetween(old, n)) {
                                nombres[i] += parseFloat(d.jsonCharges[j].prix);
                            }
                        }
                    }

                    configCanvaChiffreCharge = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Charges par Chiffre',
                                borderColor: "#F3BB45",
                                data: nombres,
                                fill: false,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Chiffre (MAD)'
                                    },
                                    gridLines: {
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };
                    
                    canvaChiffreCharge = new Chart(chartChiffreCharge, configCanvaChiffreCharge);
               }
        }); 

        $.ajax({
               type:'GET',
               url:'/home/chiffreRecette',
               data: {dateD:'', dateF:'', client:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];

                  var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            if (moment(d.jsonRecettes[j].date).isBetween(old, n)) {
                                nombres[i] += parseFloat(d.jsonRecettes[j].prix);
                            }
                        }
                    }
                  
                  configCanvaChiffreRecette = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Recettes par Chiffre',
                                borderColor: "#8FCCAA",
                                data: nombres,
                                fill: false,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Chiffre (MAD)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };

                    canvaChiffreRecette = new Chart(chartChiffreRecette, configCanvaChiffreRecette);
               }
        });

        $.ajax({
               type:'GET',
               url:'/home/quantiteCharge',
               data: {dateD:'', dateF:'', fournisseur:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];
                  
                  var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            if (moment(d.jsonCharges[j].date).isBetween(old, n)) {
                                nombres[i] += parseInt(d.jsonCharges[j].qtte);
                            }
                        }
                    }

                    var barChartData = {
                        labels: types,
                        datasets: [{
                            label: 'Charges par Quantité',
                            backgroundColor: color("#F3BB45").alpha(0.5).rgbString(),
                            borderColor: "#F3BB45",
                            borderWidth: 1,
                            data: nombres
                        }]

                    };

                  configCanvaQuantiteCharge = {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Quantité (unités)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };

                    canvaQuantiteCharge = new Chart(chartQuantiteCharge, configCanvaQuantiteCharge);
               }
        });

        $.ajax({
               type:'GET',
               url:'/home/quantiteRecette',
               data: {dateD:'', dateF:'', client:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];
                  
                  var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            if (moment(d.jsonRecettes[j].date).isBetween(old, n)) {
                                nombres[i] += parseInt(d.jsonRecettes[j].qtte);
                            }
                        }
                    }

                    var barChartData = {
                        labels: types,
                        datasets: [{
                            label: 'Recettes par Quantité',
                            backgroundColor: color("#8FCCAA").alpha(0.5).rgbString(),
                            borderColor: "#8FCCAA",
                            borderWidth: 1,
                            data: nombres
                        }]

                    };

                  configCanvaQuantiteRecette = {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Quantité (unités)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };

                    canvaQuantiteRecette = new Chart(chartQuantiteRecette, configCanvaQuantiteRecette);
               }
        });

        $.ajax({
               type:'GET',
               url:'/home/prixCharge',
               data: {dateD:'', dateF:'', fournisseur:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];
                  
                  var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonPrixCharges.length; j++) {
                            if (moment(d.jsonPrixCharges[j].date).isBetween(old, n)) {
                                nombres[i] += parseFloat(d.jsonPrixCharges[j].prix);
                            }
                        }
                    }
                  
                  configCanvaPrixCharge = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Charges par Prix Unitaire',
                                borderColor: "#F3BB45",
                                data: nombres,
                                fill: false,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Prix Unitaire'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };

                    canvaPrixCharge = new Chart(chartPrixCharge, configCanvaPrixCharge);
               }
        });

        $.ajax({
               type:'GET',
               url:'/home/prixRecette',
               data: {dateD:'', dateF:'', client:'', produit:''},
               success:function(d){
                  var nombres = [];
                  var types = [];
                  
                  var old = moment().startOf('day').subtract(6 ,'months');
                    // console.log(old);
                    var n = moment(old).endOf('day').add(1 ,'months');
                    for (var i = 0; i < 6; i++) {
                        old = moment().startOf('day').subtract(6 - i, 'months');
                        // console.log(old);
                        n = moment(old).endOf('day').add(1 ,'months');
                        nombres[i] = 0;
                        types[i] = "Month " + (i + 1);
                        for (var j = 0; j < d.jsonPrixRecettes.length; j++) {
                            if (moment(d.jsonPrixRecettes[j].date).isBetween(old, n)) {
                                nombres[i] += parseFloat(d.jsonPrixRecettes[j].prix);
                            }
                        }
                    }
                  
                  configCanvaPrixRecette = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Recettes par Prix Unitaire',
                                borderColor: "#8FCCAA",
                                data: nombres,
                                fill: false,
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false,
                            },
                            hover: {
                                mode: 'nearest',
                                intersect: true
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Temps (jours)'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Prix Unitaire'
                                    },
                                    gridLines: {
                                        // You can change the color, the dash effect, the main axe color, etc.
                                        borderDash: [1, 5],
                                        color: 'rgba(0, 0, 0, 0.3)'
                                    }
                                }]
                            }
                        }
                    };

                    canvaPrixRecette = new Chart(chartPrixRecette, configCanvaPrixRecette);
               }
        });

	});

    function updateStructureCharge(dateD, dateF) {

        $.ajax({
            type:'GET',
            url:'/home/structureCharge',
            //    data:['_token = <?php echo csrf_token() ?>', 'dateD = ' + dateD, 'dateF = ' + dateF ],
            data: {dateD:dateD, dateF:dateF},
            success:function(data){
                var nombres = [];
                var types = [];
                var colors = [];

                for (var i = 0; i < data.structure.length; i++) {
                    nombres.push(data.structure[i].nombre);
                    types.push(data.structure[i].type);
                    colors.push(getRandomColor());
                }

                //   console.log(data.structure);
                    if (nombres.length == 0) {
                        nombres.push(1);
                        types.push("No results!!");
                        colors.push("#000");
                    } 
                    canvaStructure.data.datasets[0].data = nombres;
                    canvaStructure.data.datasets[0].backgroundColor = colors;
                    canvaStructure.data.labels = types;
                    canvaStructure.update();

            }
        });

    }

    function updateChiffreCharge(dateD, dateF, fournisseur, produit) {

        $.ajax({
               type:'GET',
               url:'/home/chiffreCharge',
               data: {dateD:dateD, dateF:dateF, fournisseur:fournisseur, produit:produit},
               success:function(d){
                  var nombres = [];
                  var types = [];

                    var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();
                    var n = 0;
                    for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                        nombres.push(0);
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            dateR = moment(d.jsonCharges[j].date);
                            if (dateR.isSame(i, 'month')) {
                                nombres[n] += parseFloat(d.jsonCharges[j].prix);
                            }
                        }

                        types[n] = "Month " + (n + 1);
                        n++;
                    }

                    canvaChiffreCharge.data.datasets[0].data = nombres;
                    canvaChiffreCharge.data.labels = types;
                    canvaChiffreCharge.update();
               }
        });

    }

    function updateChiffreRecette(dateD, dateF, client, produit) {

        $.ajax({
            type:'GET',
            url:'/home/chiffreRecette',
            data: {dateD:dateD, dateF:dateF, client:client, produit:produit},
            success:function(d){
                var nombres = [];
                var types = [];
                
                var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                var dateE = dateF === "" ? moment() : moment(dateF);
                var dateR = moment();
                var n = 0;
                for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                    nombres.push(0);
                    for (var j = 0; j < d.jsonRecettes.length; j++) {
                        dateR = moment(d.jsonRecettes[j].date);
                        if (dateR.isSame(i, 'month')) {
                            nombres[n] += parseFloat(d.jsonRecettes[j].prix);
                        }
                    }

                    types[n] = "Month " + (n + 1);
                    n++;
                }

                    canvaChiffreRecette.data.datasets[0].data = nombres;
                    canvaChiffreRecette.data.labels = types;
                    canvaChiffreRecette.update();
            }
        });

    }

    function updateQuantiteCharge(dateD, dateF, fournisseur, produit) {

        $.ajax({
            type:'GET',
            url:'/home/quantiteCharge',
            data: {dateD:dateD, dateF:dateF, fournisseur:fournisseur, produit:produit},
            success:function(d){
                var nombres = [];
                var types = [];
                
                var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                var dateE = dateF === "" ? moment() : moment(dateF);
                var dateR = moment();
                var n = 0;
                for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                    nombres.push(0);
                    for (var j = 0; j < d.jsonCharges.length; j++) {
                        dateR = moment(d.jsonCharges[j].date);
                        if (dateR.isSame(i, 'month')) {
                            nombres[n] += parseInt(d.jsonCharges[j].qtte);
                        }
                    }

                    types[n] = "Month " + (n + 1);
                    n++;
                }

                    canvaQuantiteCharge.data.datasets[0].data = nombres;
                    canvaQuantiteCharge.data.labels = types;
                    canvaQuantiteCharge.update();
            }
        });

    }

    function updateQuantiteRecette(dateD, dateF, client, produit) {

        $.ajax({
            type:'GET',
            url:'/home/quantiteRecette',
            data: {dateD:dateD, dateF:dateF, client:client, produit:produit},
            success:function(d){
                var nombres = [];
                var types = [];

                var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                var dateE = dateF === "" ? moment() : moment(dateF);
                var dateR = moment();
                var n = 0;
                for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                    nombres.push(0);
                    for (var j = 0; j < d.jsonRecettes.length; j++) {
                        dateR = moment(d.jsonRecettes[j].date);
                        if (dateR.isSame(i, 'month')) {
                            nombres[n] += parseInt(d.jsonRecettes[j].qtte);
                        }
                    }

                    types[n] = "Month " + (n + 1);
                    n++;
                }

                    canvaQuantiteRecette.data.datasets[0].data = nombres;
                    canvaQuantiteRecette.data.labels = types;
                    canvaQuantiteRecette.update();
            }
        });

    }

    function updatePrixCharge(dateD, dateF, fournisseur, produit) {

        $.ajax({
            type:'GET',
            url:'/home/prixCharge',
            data: {dateD:dateD, dateF:dateF, fournisseur:fournisseur, produit:produit},
            success:function(d){
                var nombres = [];
                var types = [];
                
                var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                var dateE = dateF === "" ? moment() : moment(dateF);
                var dateR = moment();
                var n = 0;
                for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                    nombres.push(0);
                    for (var j = 0; j < d.jsonPrixCharges.length; j++) {
                        dateR = moment(d.jsonPrixCharges[j].date);
                        if (dateR.isSame(i, 'month')) {
                            nombres[n] += parseFloat(d.jsonPrixCharges[j].prix);
                        }
                    }

                    types[n] = "Month " + (n + 1);
                    n++;
                }

                    canvaPrixCharge.data.datasets[0].data = nombres;
                    canvaPrixCharge.data.labels = types;
                    canvaPrixCharge.update();
            }
        });

    }

    function updatePrixRecette(dateD, dateF, client, produit) {

        $.ajax({
            type:'GET',
            url:'/home/prixRecette',
            data: {dateD:dateD, dateF:dateF, client:client, produit:produit},
            success:function(d){
                var nombres = [];
                var types = [];
                
                var dateS = dateD === "" ? moment().add(-6, 'months') : moment(dateD);
                var dateE = dateF === "" ? moment() : moment(dateF);
                var dateR = moment();
                var n = 0;
                for (var i = moment(dateS); i.isBefore(dateE); i.add(1, 'months')) {
                    nombres.push(0);
                    for (var j = 0; j < d.jsonPrixRecettes.length; j++) {
                        dateR = moment(d.jsonPrixRecettes[j].date);
                        if (dateR.isSame(i, 'month')) {
                            nombres[n] += parseFloat(d.jsonPrixRecettes[j].prix);
                        }
                    }

                    types[n] = "Month " + (n + 1);
                    n++;
                }

                    canvaPrixRecette.data.datasets[0].data = nombres;
                    canvaPrixRecette.data.labels = types;
                    canvaPrixRecette.update();
            }
        });

    }

    function filterFournisseurChiffreCharge() {
        var fournisseur = $('#fournisseurChiffreCharge').val();
        
        var f = $("#fournisseurChiffreCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updateChiffreCharge(v1, v2, f, '');
        
        $("#produitChiffreCharge option").remove();
        $('#produitChiffreCharge').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterCharge',
            data: {fournisseur:fournisseur},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitChiffreCharge').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterClientChiffreRecette() {
        var client = $('#clientChiffreRecette').val();
        var c = $("#clientChiffreRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updateChiffreRecette(v1, v2, c, '');
        
        $("#produitChiffreRecette option").remove();
        $('#produitChiffreRecette').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterRecette',
            data: {client:client},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitChiffreRecette').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterFournisseurQuantiteCharge() {
        var fournisseur = $('#fournisseurQuantiteCharge').val();
        var f = $("#fournisseurQuantiteCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updateQuantiteCharge(v1, v2, f, '');
        
        $("#produitQuantiteCharge option").remove();
        $('#produitQuantiteCharge').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterCharge',
            data: {fournisseur:fournisseur},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitQuantiteCharge').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterClientQuantiteRecette() {
        var client = $('#clientQuantiteRecette').val();
        var c = $("#clientQuantiteRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updateQuantiteRecette(v1, v2, c, '');
        
        $("#produitQuantiteRecette option").remove();
        $('#produitQuantiteRecette').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterRecette',
            data: {client:client},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitQuantiteRecette').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterFournisseurPrixCharge() {
        var fournisseur = $('#fournisseurPrixCharge').val();
        var f = $("#fournisseurPrixCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updatePrixCharge(v1, v2, f, '');
        
        $("#produitPrixCharge option").remove();
        $('#produitPrixCharge').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterCharge',
            data: {fournisseur:fournisseur},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitPrixCharge').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterClientPrixRecette() {
        var client = $('#clientPrixRecette').val();
        var c = $("#clientPrixRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updatePrixRecette(v1, v2, c, '');
        
        $("#produitPrixRecette option").remove();
        $('#produitPrixRecette').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterRecette',
            data: {client:client},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitPrixRecette').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterClientPrixRecette() {
        var client = $('#clientPrixRecette').val();
        var c = $("#clientPrixRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updatePrixRecette(v1, v2, c, '');
        
        $("#produitPrixRecette option").remove();
        $('#produitPrixRecette').append('<option value="">Produit..</option>');

        $.ajax({
            type:'GET',
            url:'/home/filterRecette',
            data: {client:client},
            success:function(d){

                for(var i = 0; i < d.jsonProduits.length; i++) {
                    $('#produitPrixRecette').append('<option value="'+ d.jsonProduits[i].produit  +'">'+ d.jsonProduits[i].produit  +'</option>');
                }

            }
        });        

    }

    function filterProduitChiffreCharge() {
        var fournisseur = $('#fournisseurChiffreCharge').val();
        var produit = $('#produitChiffreCharge').val();
        var f = $("#fournisseurChiffreCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updateChiffreCharge(v1, v2, f, produit);
    }

    function filterProduitChiffreRecette() {
        var client = $('#clientChiffreRecette').val();
        var produit = $('#produitChiffreRecette').val();
        var c = $("#clientChiffreRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updateChiffreRecette(v1, v2, c, produit);
    }

    function filterProduitQuantiteCharge() {
        var fournisseur = $('#fournisseurQuantiteCharge').val();
        var produit = $('#produitQuantiteCharge').val();
        var f = $("#fournisseurQuantiteCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updateQuantiteCharge(v1, v2, f, produit);
    }

    function filterProduitQuantiteRecette() {
        var client = $('#clientQuantiteRecette').val();
        var produit = $('#produitQuantiteRecette').val();
        var c = $("#clientQuantiteRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updateQuantiteRecette(v1, v2, c, produit);
    }

    function filterProduitPrixCharge() {
        var fournisseur = $('#fournisseurPrixCharge').val();
        var produit = $('#produitPrixCharge').val();
        var f = $("#fournisseurPrixCharge option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (fournisseur == '')
            f = '';


        updatePrixCharge(v1, v2, f, produit);
    }

    function filterProduitPrixRecette() {
        var client = $('#clientPrixRecette').val();
        var produit = $('#produitPrixRecette').val();
        var c = $("#clientPrixRecette option:selected").text();
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();

        if (client == '')
            c = '';


        updatePrixRecette(v1, v2, c, produit);
    }

    var charge = $('#charge').val();
    var recette = $('#recette').val();

    function changeCharts() {
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        updateStructureCharge(v1, v2);
        filterProduitChiffreCharge();
        filterProduitChiffreRecette();
        filterProduitQuantiteCharge();
        filterProduitQuantiteRecette();
        filterProduitPrixCharge();
        filterProduitPrixRecette();
    }
</script>
@endsection