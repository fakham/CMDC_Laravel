<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login CMDC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--======================================loginv13=========================================================-->
    <link rel="icon" type="image/png" href="{{ asset('login_files/images/icons/favicon.ico') }}" />
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/animate/animate.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/animsition/css/animsition.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/select2/select2.min.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/vendor/daterangepicker/daterangepicker.css') }}">
    <!--======================================loginv13=========================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_files/css/main.css') }}">
    <!--======================================loginv13=========================================================-->
</head>

<body style="background-color: #999999;">

    <div class="limiter">
        <div class="container-login100">

            <div class="login100-more" style="background-image: url('img/bg.jpg');"></div>
                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                    
                    
                    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                          <a  style="align-content: center;text-align: left "href="/" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30" >
							Home
							<i class="fa fa-long-arrow-left m-l-5"></i>
						</a>
                        <span class="login100-form-title p-b-59">     
						Sign Up
					    </span>

                        <div class="wrap-input100 validate-input" data-validate="Prenom is required">
                            <span class="label-input100"> Prenom</span>
                            <input class="input100" type="text" id="prenom" name="prenom" placeholder="Prenom..." required autofocus>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Nom is required">
                            <span class="label-input100">Nom</span>
                            <input class="input100" type="text" id="nom" name="nom" placeholder="Nom..." required autofocus>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" id="username" name="username" placeholder="Username..." required autofocus>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="E-Mail Address is required: ex@abc.xyz">
                            <span class="label-input100">E-Mail Address</span>
                            <input class="input100" type="text" id="email" name="email" placeholder="E-Mail Address..." required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Telephone is required: ex@abc.xyz">
                            <span class="label-input100">Telephone</span>
                            <input class="input100" type="text" id="telephone" name="telephone" placeholder="Telephone..." required autofocus>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" id="password" name="password" placeholder="Password..." required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                            <span class="label-input100">Repeat Password</span>
                            <input class="input100" type="password" id="password-confirm" name="password_confirmation" placeholder="*************" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-m w-full p-b-33">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
                            </div>


                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
								Sign Up
							</button>
                            </div>

                            <a href="/login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							login
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
                        </div>
                    </form>
                </div>
            
            
        </div>
    </div>

    <!--===================================loginv13============================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--=====================================loginv13==========================================================-->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <!--=====================================loginv13==========================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--=====================================loginv13==========================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--=====================================loginv13==========================================================-->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--====================================loginv13===========================================================-->
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <!--====================================loginv13===========================================================-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
