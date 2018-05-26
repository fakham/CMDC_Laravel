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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet" />

    
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

     

             <!--  repeter dans tout les pages  -->
			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="/home" class="simple-text">
                    CMDC app
                </a>
				</div>

				<ul class="nav">
					<li class="">
						<a href="/home">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
					</li>
					<li>
						<li class="active">
						<a href="/profile">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
					</li>
					<li class="dropdown ">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class=" ti-pie-chart"></i>
                                    <p class="notification"></p>
									<p>Charge </p>
									
                              </a>
						<ul class="dropdown-menu">
							<li><a href="/charges/add">init</a></li>
							<li><a href="/charges">Modif/suppr</a></li>

						</ul>
					</li>
					<li>
						<li class="dropdown ">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-receipt"></i>
                                    <p class="notification"></p>
									<p>Recettes</p>
									
                              </a>
							<ul class="dropdown-menu">
								<li><a href="/recettes/add">init</a></li>
								<li><a href="/recettes">Modif/suppr</a></li>

							</ul>
						</li>
						<li>
							<li class="dropdown ">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class=" ti-pencil-alt2"></i>
                                    <p class="notification"></p>
									<p>Programme</p>
									
                              </a>
								<ul class="dropdown-menu">
									<li><a href="/produits/add">init</a></li>
									<li><a href="/programmer">Modif/suppr</a></li>
									<li><a href="ajouterClient.html">Ajouter Client</a></li>
									<li><a href="AjouterFournisseur.html">Ajouter Fournisseur</a></li>

								</ul>
							</li>


				</ul>
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
						<a class="navbar-brand" href="dashboard.html">Dashboard</a>
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
									<li><a href="Controle%20de%20utilisateurs.html">Control</a></li>
									<li><a href="user.html">Profile</a></li>
									<!-- a mohammed-->
									<li><a href="#">Deconnecter</a></li>

								</ul>
							</li>

						</ul>

					</div>
				</div>
			</nav>


            <div class="content">
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
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
