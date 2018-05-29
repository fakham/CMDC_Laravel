@extends('../layouts.app')

@section('content')
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
@endsection