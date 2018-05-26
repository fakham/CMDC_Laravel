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
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Users Behavior</h4>
                    <p class="category">24 Hours performance</p>
                </div>
                <div class="content">
                    <div id="chartHours" class="ct-chart"></div>
                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Click
                            <i class="fa fa-circle text-warning"></i> Click Second Time
                        </div>
                        <hr>
                        <div class="stats">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">charge Statistics</h4>
                    <p class="category">Last Campaign Performance</p>
                </div>
                <div class="content">
                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> charge
                            <i class="fa fa-circle text-danger"></i> recette
                            <i class="fa fa-circle text-warning"></i> ......
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-timer"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <h4 class="title">2018 Sales</h4>
                    <p class="category">All products including Taxes</p>
                </div>
                <div class="content">
                    <div id="chartActivity" class="ct-chart"></div>

                    <div class="footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> gtx1050
                            <i class="fa fa-circle text-warning"></i> ram drr4
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="ti-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
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
</script>
@endsection