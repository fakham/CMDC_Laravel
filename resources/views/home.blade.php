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
</div>
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {

		demo.initChartist();

		$.notify({
			icon: 'ti-gift',
			message: "Welcome to <b>CMDC APP</b> "

		}, {
			type: 'success',
			timer: 4000
		});

	});

    const CHART = document.getElementById("chart");
    const CHART2 = document.getElementById("chart2");

    var charges = {!! $jsonCharges !!};
    var recettes = {!! $jsonRecettes !!};

    function dailyRecette(dateD, dateF, client) {
        var labels = [];
        var data = [];
        var qtte = [];
        
        var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
        var dateE = dateF === "" ? moment() : moment(dateF);
        var dateR = moment();
        
        var isClient = client == "" ? false : true;
        var isFound = false;
        for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
            for (var j = 0; j < recettes.length; j++) {
                dateR = moment(recettes[j].date);
                if (dateR.isSame(i, "day") && (!isClient || recettes[j].id_client == client)) {
                    isFound = true;
                    data.push(recettes[j].prix * recettes[j].qtte);
                    qtte.push(recettes[j].qtte);
                }
            }
            if (!isFound) {
                data.push(0);
                qtte.push(0);
            } else
                isFound = false;

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
                        label: 'Charges : Quantité',
                        data: qtte,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                    },
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
    }

    function dailyCharge(dateD, dateF, fournisseur) {
        var labels = [];
        var data = [];
        var qtte = [];
        
        var dateS = dateD === "" ? moment().add(-30, 'days') : moment(dateD);
        var dateE = dateF === "" ? moment() : moment(dateF);
        var dateR = moment();
        
        var isFournisseur = fournisseur == "" ? false : true;
        var isFound = false;
        for (var i = dateS; i.isBefore(dateE); i.add(1, 'days')) {
            for (var j = 0; j < charges.length; j++) {
                dateR = moment(charges[j].date);
                if (dateR.isSame(i, "day") && (!isFournisseur || charges[j].id_fournisseur == fournisseur)) {
                    isFound = true;
                    data.push(charges[j].prix * charges[j].qtte);
                    qtte.push(charges[j].qtte);
                }
            }
            if (!isFound) {
                data.push(0);
                qtte.push(0);
            } else
                isFound = false;

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
                        label: 'Charges : Quantité',
                        data: qtte,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                    },
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
    }

    dailyCharge('', '', '');
    dailyRecette('', '', '');

    function changeCharts() {
        var v1 = $('#datepicker1').val();
        var v2 = $('#datepicker2').val();
        var v3 = $('#client').val();
        var v4 = $('#fournisseur').val();
        dailyCharge(v1, v2, v4);
        dailyRecette(v1, v2, v3);
        console.log(v1);
        console.log(v3);
        // console.log(moment($('#datetimepicker1').val()).get('date')); 
        // console.log(moment($('#datetimepicker2').val()).get('date')); 
    }
</script>
@endsection