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
                <div class="col-md-3">
                    Période : 
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
                    <h4 class="title">Recette Statistics (Prix)</h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-5">
                            <select id="clientChiffreRecette" name="client" class="form-control border-input" onchange="filterClientChiffreRecette()">
                                <option value="" selected>Client.. (Tous)</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}">{{$client->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select id="produitChiffreRecette" name="client" class="form-control border-input" onchange="filterProduitChiffreRecette()">
                                <option value="" selected>Produit..</option>
                            </select>
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
                    <h4 class="title">Analyse charges en chiffre</h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-6">
                            <select id="fournisseurChiffreCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurChiffreCharge()">
                                <option value="" selected>Fournisseur.. (Tous)</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select id="produitChiffreCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitChiffreCharge()">
                                <option value="" selected>Produit..</option>
                            </select>
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
                    <h4 class="title">Recette Statistics (Quantité)</h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-5">
                            <select id="clientQuantiteRecette" name="client" class="form-control border-input" onchange="filterClientQuantiteRecette()">
                                <option value="" selected>Client.. (Tous)</option>
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}">{{$client->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select id="produitQuantiteRecette" name="client" class="form-control border-input" onchange="filterProduitQuantiteRecette()">
                                <option value="" selected>Produit..</option>
                            </select>
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
                    <h4 class="title">Charge Statistics (Quantité)</h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-6">
                            <select id="fournisseurQuantiteCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurQuantiteCharge()">
                                <option value="" selected>Fournisseur.. (Tous)</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select id="produitQuantiteCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitQuantiteCharge()">
                                <option value="" selected>Produit..</option>
                            </select>
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
            <div class="card ">
                <div class="header">
                    <h4 class="title">Charge Statistics (Prix unitaire)</h4>
                    <div class="d-flex justify-content-center">
                        <div class="col-sm-6">
                            <select id="fournisseurPrixCharge" name="fournisseur" class="form-control border-input" onchange="filterFournisseurPrixCharge()">
                                <option value="" selected>Fournisseur.. (Tous)</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select id="produitPrixCharge" name="fournisseur" class="form-control border-input" onchange="filterProduitPrixCharge()">
                                <option value="" selected>Produit..</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <canvas id="canvaPrixCharge"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
<script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script type="text/javascript">

    var color = Chart.helpers.color;

    var chartCanvaStructure = document.getElementById("canvaStructure");
    var chartChiffreRecette = document.getElementById("chart");
    var chartChiffreCharge = document.getElementById("chart2");
    var chartQuantiteRecette = document.getElementById("chart3");
    var chartQuantiteCharge = document.getElementById("chart4");
    var chartPrixCharge = document.getElementById("canvaPrixCharge");

    var canvaStructure;
    var canvaChiffreRecette;
    var canvaChiffreCharge;
    var canvaQuantiteRecette;
    var canvaQuantiteCharge;
    var canvaPrixCharge;

    var configCanvaStructure;
    var configCanvaChiffreRecette;
    var configCanvaChiffreCharge;
    var configCanvaQuantiteRecette;
    var configCanvaQuantiteCharge;
    var configCanvaPrixCharge;

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
                  var isFound = false;
                    
                    var dateD = '';
                    var dateF = '';

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            dateR = moment(d.jsonCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonCharges[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }

                    configCanvaChiffreCharge = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Charges par Chiffre',
                                borderColor: "#61C8C8",
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
                                        borderDash: [8, 4]
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Chiffre (MAD)'
                                    },
                                    gridLines: {
                                        borderDash: [8, 4]
                                    }
                                }]
                            }
                        }
                    };
                  
                  /*configCanvaChiffreCharge = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Charges par Chiffre',
                                backgroundColor: color("#61C8C8").alpha(0.5).rgbString(),
                                borderColor: "#61C8C8",
                                data: nombres,
                            }]
                        },
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Charges par Chiffre'
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
                                        labelString: 'Jour'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Chiffre'
                                    }
                                }]
                            }
                        }
                    };
                    */

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
                  var isFound = false;
                    
                    var dateD = '';
                    var dateF = '';

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            dateR = moment(d.jsonRecettes[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonRecettes[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }
                  
                  configCanvaChiffreRecette = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Recettes par Chiffre',
                                backgroundColor: color("#61C8C8").alpha(0.5).rgbString(),
                                borderColor: "#61C8C8",
                                data: nombres,
                            }]
                        },
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Recettes par Chiffre'
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
                                        labelString: 'Jour'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Chiffre'
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
                  var isFound = false;
                    
                    var dateD = '';
                    var dateF = '';

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            dateR = moment(d.jsonCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonCharges[j].qtte);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }

                    var barChartData = {
                        labels: types,
                        datasets: [{
                            label: 'Charges par Quantité',
                            backgroundColor: color("#61C8C8").alpha(0.5).rgbString(),
                            borderColor: "#61C8C8",
                            borderWidth: 1,
                            data: nombres
                        }]

                    };

                  configCanvaQuantiteCharge = {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Charges par Quantité'
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
                                        labelString: 'Jour'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Quantité'
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
                  var isFound = false;
                    
                    var dateD = '';
                    var dateF = '';

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            dateR = moment(d.jsonRecettes[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonRecettes[j].qtte);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }

                    var barChartData = {
                        labels: types,
                        datasets: [{
                            label: 'Recettes par Quantité',
                            backgroundColor: color("#61C8C8").alpha(0.5).rgbString(),
                            borderColor: "#61C8C8",
                            borderWidth: 1,
                            data: nombres
                        }]

                    };

                  configCanvaQuantiteRecette = {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Recettes par Quantité'
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
                                        labelString: 'Jour'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Quantité'
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
                  var isFound = false;
                    
                    var dateD = '';
                    var dateF = '';

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonPrixCharges.length; j++) {
                            dateR = moment(d.jsonPrixCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonPrixCharges[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }
                  
                  configCanvaPrixCharge = {
                        type: 'line',
                        data: {
                            labels: types,
                            datasets: [{
                                label: 'Charges par Prix Unitaire',
                                backgroundColor: color("#61C8C8").alpha(0.5).rgbString(),
                                borderColor: "#61C8C8",
                                data: nombres,
                            }]
                        },
                        options: {
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Charges par Prix Unitaire'
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
                                        labelString: 'Jour'
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Prix Unitaire'
                                    }
                                }]
                            }
                        }
                    };

                    canvaPrixCharge = new Chart(chartPrixCharge, configCanvaPrixCharge);
               }
        });

	});

    var charges = {!! $jsonCharges !!};
    var recettes = {!! $jsonRecettes !!};

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
                  var isFound = false;

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            dateR = moment(d.jsonCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonCharges[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
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
                var isFound = false;

                console.log(d.jsonRecettes);

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            dateR = moment(d.jsonRecettes[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonRecettes[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
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
                var isFound = false;

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonCharges.length; j++) {
                            dateR = moment(d.jsonCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonCharges[j].qtte);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
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
                var isFound = false;

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonRecettes.length; j++) {
                            dateR = moment(d.jsonRecettes[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonRecettes[j].qtte);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
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
                var isFound = false;

                    var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
                    var dateE = dateF === "" ? moment() : moment(dateF);
                    var dateR = moment();

                    for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
                        for (var j = 0; j < d.jsonPrixCharges.length; j++) {
                            dateR = moment(d.jsonPrixCharges[j].date);
                            if (dateR.isSame(i, "day")) {
                                isFound = true;
                                nombres.push(d.jsonPrixCharges[j].prix);
                            }
                        }
                        if (!isFound) {
                            nombres.push(0);
                        } else
                            isFound = false;

                        types.push(i.get('date'));
                    }

                    canvaPrixCharge.data.datasets[0].data = nombres;
                    canvaPrixCharge.data.labels = types;
                    canvaPrixCharge.update();
            }
        });

    }

    function dailyRecette(dateD, dateF, client, recette) {
        var labels = [];
        var data = [];
        var qtte = [];
        
        var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
        var dateE = dateF === "" ? moment() : moment(dateF);
        var dateR = moment();
        
        var isClient = client == "" ? false : true;
        var isFound = false;
        var isFoundQtte = false;
        for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
            for (var j = 0; j < recettes.length; j++) {
                dateR = moment(recettes[j].date);
                if (dateR.isSame(i, "day") && (!isClient || recettes[j].id_client == client)) {
                    isFound = true;
                    data.push(recettes[j].prix * recettes[j].qtte);
                    if (recette == recettes[j].produit) {
                        qtte.push(recettes[j].qtte);
                        isFoundQtte = true;
                    }
                }
            }
            if (!isFound) {
                data.push(0);
            } else
                isFound = false;

            if (!isFoundQtte)
                qtte.push(0);
            else
                isFoundQtte = false;

            labels.push(i.get('date'));
        }
        // data.shift();
        console.log(data);

        let lineChart = new Chart(CHART, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Recettes : Prix',
                        data: data,
                        borderColor: [
                            "#61C8C8"
                        ],
                        type: 'line'
                    }
                ]
            }
        });

        let lineChart2 = new Chart(CHART3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Quantité ('+recette+')',
                        data: qtte,
                        borderColor: [
                            "#61C8C8"
                        ],
                        type: 'bar'
                    }
                ]
            }
        });
    }

    function dailyCharge(dateD, dateF, fournisseur, charge) {
        var labels = [];
        var data = [];
        var qtte = [];
        
        var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
        var dateE = dateF === "" ? moment() : moment(dateF);
        var dateR = moment();
        
        var isFournisseur = fournisseur == "" ? false : true;
        var isFound = false;
        var isFoundQtte = false;
        for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
            for (var j = 0; j < charges.length; j++) {
                dateR = moment(charges[j].date);
                if (dateR.isSame(i, "day") && (!isFournisseur || charges[j].id_fournisseur == fournisseur)) {
                    isFound = true;
                    data.push(charges[j].prix * charges[j].qtte);
                    if (charge == charges[j].produit) {
                        isFoundQtte = true;
                        qtte.push(charges[j].qtte);
                    }
                }
            }
            if (!isFound) {
                data.push(0);
            } else
                isFound = false;

            if (!isFoundQtte) {
                qtte.push(0);
            } else
                isFoundQtte = false;

            labels.push(i.get('date'));
        }
        // data.shift();
        console.log(data);

        let lineChart = new Chart(CHART2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Charges : Prix',
                        data: data,
                        borderColor: [
                            "#61C8C8"
                        ],
                        type: 'line'
                    }
                ]
            }
        });

        let lineChart2 = new Chart(CHART4, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Quantité ('+charge+')',
                        data: qtte,
                        borderColor: [
                            "#61C8C8"
                        ],
                        type: 'bar'
                    }
                ]
            }
        });
    }

    function filterFournisseurChiffreCharge() {
        var fournisseur = $('#fournisseurChiffreCharge').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurChiffreCharge option:selected").text();

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

        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var c = $("#clientChiffreRecette option:selected").text();

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

        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurQuantiteCharge option:selected").text();

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

        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var c = $("#clientQuantiteRecette option:selected").text();

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

        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurPrixCharge option:selected").text();

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

    function filterProduitChiffreCharge() {
        var fournisseur = $('#fournisseurChiffreCharge').val();
        var produit = $('#produitChiffreCharge').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurChiffreCharge option:selected").text();

        if (fournisseur == '')
            f = '';


        updateChiffreCharge(v1, v2, f, produit);
    }

    function filterProduitChiffreRecette() {
        var client = $('#clientChiffreRecette').val();
        var produit = $('#produitChiffreRecette').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var c = $("#clientChiffreRecette option:selected").text();

        if (client == '')
            c = '';


        updateChiffreRecette(v1, v2, c, produit);
    }

    function filterProduitQuantiteCharge() {
        var fournisseur = $('#fournisseurQuantiteCharge').val();
        var produit = $('#produitQuantiteCharge').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurQuantiteCharge option:selected").text();

        if (fournisseur == '')
            f = '';


        updateQuantiteCharge(v1, v2, f, produit);
    }

    function filterProduitQuantiteRecette() {
        var client = $('#clientQuantiteRecette').val();
        var produit = $('#produitQuantiteRecette').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var c = $("#clientQuantiteRecette option:selected").text();

        if (client == '')
            c = '';


        updateQuantiteRecette(v1, v2, c, produit);
    }

    function filterProduitPrixCharge() {
        var fournisseur = $('#fournisseurPrixCharge').val();
        var produit = $('#produitPrixCharge').val();
        
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var f = $("#fournisseurPrixCharge option:selected").text();

        if (fournisseur == '')
            f = '';


        updatePrixCharge(v1, v2, f, produit);
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
    }
</script>
@endsection