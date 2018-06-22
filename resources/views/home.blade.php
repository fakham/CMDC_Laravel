@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
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
                                {{ $resultatsCharges }}
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
                                {{ $resultatsRecettes }}
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
                                {{ $resultats }}
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
                        <div class="input-group col-sm-5">
                            <select id="client" name="client" class="form-control border-input" onchange="changeCharts()">
                                <option value="" selected>Client.. (Tous)</option>
                                @foreach ($recettes as $recette)
                                    <option value="{{$recette->id_client}}">{{$recette->client}}</option>
                                @endforeach
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
                    <h4 class="title">Charge Statistics (Prix)</h4>
                    <div class="d-flex justify-content-center">
                        <div class="input-group col-sm-6">
                            <select id="fournisseur" name="fournisseur" class="form-control border-input" onchange="changeCharts()">
                                <option value="" selected>Fournisseur.. (Tous)</option>
                                @foreach ($charges as $charge)
                                    <option value="{{$charge->id_fournisseur}}">{{$charge->fournisseur}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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
                        <div class="input-group col-sm-5">
                            <select id="recette" name="recette" class="form-control border-input" onchange="changeCharts()">
                                @foreach ($produitsRecette as $recette)
                                    <option value="{{$recette->nom}}">{{$recette->nom}}</option>
                                @endforeach
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
                        <div class="input-group col-sm-6">
                            <select id="charge" name="charge" class="form-control border-input" onchange="changeCharts()">
                                @foreach ($produitsCharge as $charge)
                                    <option value="{{$charge->nom}}">{{$charge->nom}}</option>
                                @endforeach
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
                            @foreach ($clients as $client)
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

    var chartCanvaStructure = document.getElementById("canvaStructure");
    var canvaStructure;

    var config;

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
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  var nombres = [];
                  var types = [];
                  var colors = [];

                  for (var i = 0; i < data.structure.length; i++) {
                      nombres.push(data.structure[i].nombre);
                      types.push(data.structure[i].type);
                      colors.push(getRandomColor());
                  }
                  
                  config = {
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
                  canvaStructure = new Chart(chartCanvaStructure, config);
               }
        });

	});


    const CHART = document.getElementById("chart");
    const CHART2 = document.getElementById("chart2");
    const CHART3 = document.getElementById("chart3");
    const CHART4 = document.getElementById("chart4");

    var charges = {!! $jsonCharges !!};
    var recettes = {!! $jsonRecettes !!};

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
    var charge = $('#charge').val();
    var recette = $('#recette').val();
    dailyCharge('', '', '', charge);
    dailyRecette('', '', '', recette);

    function changeCharts() {
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var v3 = $('#client').val();
        var v4 = $('#fournisseur').val();
        var charge = $('#charge').val();
        var recette = $('#recette').val();
        dailyCharge(v1, v2, v4, charge);
        dailyRecette(v1, v2, v3, recette);
        console.log(v1);
        console.log(v3);
        // console.log(moment($('#datetimepicker1').val()).get('date')); 
        // console.log(moment($('#datetimepicker2').val()).get('date')); 
    }
</script>
@endsection