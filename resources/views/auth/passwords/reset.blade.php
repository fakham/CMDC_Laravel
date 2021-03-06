<!DOCTYPE html>
<html lang="en">

<head>
    <title>Find Your Account </title>
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

            <div class="login100-more" style="background-image: url('img/calculator.jpeg');"></div>
            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form" method="POST" action="{{ route('password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <span class="login100-form-title p-b-59">
                        
                            <a style="font-size:20px; " href="../../" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30"> 
                                <i class="fa fa-long-arrow-left m-l-5"></i>
							Home
							
						</a>
						Reset Your Password
					</span>
                   



                    


                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input id="email" type="email" placeholder="email@exemple.com" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" placeholder="*************" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100"></span>
                    </div>
					
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Confirm password</span>
                        <input id="password-confirm" type="password" placeholder="*************" class="input100" name="password_confirmation" required>
                        <span class="focus-input100"></span>
                    </div>
					      <div class="flex-m w-full p-b-33">
                         

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div  class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                      
                    </div>
                    
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