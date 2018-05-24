<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="http://momentjs.com/downloads/moment.js" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    <script src="{{ asset('/js/Chart.min.js') }}"></script>

    <style>
        .sidenav {
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 300px;
            left: 10px;
            background: #eee;
            overflow-x: hidden;
            padding: 8px 0;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #2196F3;
            display: block;
        }

        .sidenav a:hover {
            color: #064579;
        }

        .main {
            margin-left: 140px; /* Same width as the sidebar + left position in px */
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 300px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CMDC') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
                            @if ( Auth::user()->role <= 2 )
                                <li><a class="nav-link" href="{{ route('control') }}">{{ __('Control') }}</a></li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (Auth::check() && Auth::user()->role <= 3)
        <div class="sidenav">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">Charges</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/charges/add">Init</a></li>
                            <li class="list-group-item"><a href="/charges">Modif/Suppr</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2">Recettes</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/recettes/add">Init</a></li>
                            <li class="list-group-item"><a href="/recettes">Modif/Suppr</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3">Programmer</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/produits/add">Init</a></li>
                            <li class="list-group-item"><a href="/programmer">Modif/Suppr</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (Auth::user()->role <= 3)
                                <!--<h1>You are logged in!</h1>-->
                                <ul class="list-inline">
                                    <li class="list-inline-item"><h4>Charges : {{ $resultatsCharges }}</h4></li>
                                    <li class="list-inline-item"><h4>Recettes : {{ $resultatsRecettes }}</h4></li>
                                </ul>
                                <div><h3>Résultats : {{ $resultats }}</h3></div>
                                <div class="row d-flex justify-content-center">
                                    <div class="d-flex flex-row text-center">Période : </div>
                                    <div class='col-sm-3'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input id="datepicker1" type='text' class="form-control" name="date" placeholder="Du..." onchange="changeCharts()" onclick="(this.type='date')"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker2'>
                                                <input id="datepicker2" type='text' class="form-control" name="date" placeholder="Au..." onchange="changeCharts()" onclick="(this.type='date')"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row center-xs">
                                <div style="width:430px">
                                    <div class="d-flex justify-content-center">
                                        <div class="input-group col-sm-5">
                                            <select id="client" name="client" class="form-control" onchange="changeCharts()">
                                                <option value="" selected>Client.. (Tous)</option>
                                                @foreach ($recettes as $recette)
                                                    <option value="{{$recette->id_client}}">{{$recette->client}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="chart" width="400" height="400"></canvas>
                                </div>
                                <div style="width:430px">
                                    <div class="d-flex justify-content-center">
                                        <div class="input-group col-sm-6">
                                            <select id="fournisseur" name="fournisseur" class="form-control" onchange="changeCharts()">
                                                <option value="" selected>Fournisseur.. (Tous)</option>
                                                @foreach ($charges as $charge)
                                                    <option value="{{$charge->id_fournisseur}}">{{$charge->fournisseur}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <canvas id="chart2" width="400" height="400"></canvas>
                                </div>
                                </div>
                                @else
                                <h1 style="color:red">Votre compte est en cours d'activation...</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
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
                                    label: 'Recettes : Quantité',
                                    data: qtte,
                                    borderColor: [
                                        "#FF0000"
                                    ],
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
                                    borderColor: [
                                        "#FF0000"
                                    ],
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

                // $(function () {
                //     $('#datetimepicker1').datetimepicker();
                // });
                // $(function () {
                //     $('#datetimepicker2').datetimepicker();
                // });
            </script>
        </main>
    </div>
</body>
</html>
