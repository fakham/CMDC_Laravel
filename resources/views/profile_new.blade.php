<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>CMDC</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet" />

    
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

</head>

<body>

    <div class="wrapper">
        <div class="sidebar">

     

             <!--  repeter dans tout les pages  -->
			<div class="sidebar-wrapper">
				<div class="logo">
                    <a href="/home" class="simple-text">
                        CMDC
                    </a>
				</div>
			</div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">




							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-layout-list-thumb"></i>
                                    
									<p>Acount setting</p>
									<b class="ti-angle-double-down"></b>
                              </a>
								<ul class="dropdown-menu">
									<li><a href="/profile">Profile</a></li>
									<!-- a mohammed-->
									<li><a href="{{ route('logout') }}" 
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Deconnecter</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

								</ul>
							</li>

						</ul>

					</div>
				</div>
			</nav>


<div class="content">
    <main class="py-4">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Profile</h4>
                        </div>
                        <div class="content">
                            <form method="POST" action="{{'profile/'.Auth::id().'/update'}}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input id="prenom" type="text" class="form-control border-input{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ Auth::user()->prenom }}" required autofocus>
                                            
                                            @if ($errors->has('prenom'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('prenom') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input id="nom" type="text" class="form-control border-input{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ Auth::user()->nom }}" required autofocus>

                                            @if ($errors->has('nom'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('nom') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input id="username" type="text" class="form-control border-input{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ Auth::user()->username }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email adresse</label>
                                            <input id="email" type="email" class="form-control border-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input id="telephone" type="text" class="form-control border-input{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ Auth::user()->telephone }}" required autofocus>

                                            @if ($errors->has('telephone'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('telephone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control border-input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="*********" name="password" value="{{ Auth::user()->password }}" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>



                                </div>

                                <div class="row">

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
        <script type="text/javascript">
            document.getElementById("activeProfile").classList.add('active');
            document.getElementById("activeDashboard").classList.remove('active');
            document.getElementById("activeCharge").classList.remove('active');
            document.getElementById("activeRecette").classList.remove('active');
            document.getElementById("activeProgramme").classList.remove('active');
            
            $(document).ready(function() {

                @if (app('request')->input('modified'))
                    $.notify({
                        icon: 'ti-pencil',
                        message: "<b>Profile modified successfully.</b>"

                    }, {
                        type: 'info',
                        timer: 4000
                    });
                @endif

            });

        </script>
    </main>
</div>


<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>

            </ul>
        </nav>
    </div>
</footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>

</html>