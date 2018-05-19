@extends('layouts.app')

@section('content')
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
                        <li class="list-inline-item"><h4>Résultats d'exploitation : {{ $resultatsExp }}</h4></li>
                        <li class="list-inline-item"><h4>Résultats financiers : {{ $resultatsFin }}</h4></li>
                        <li class="list-inline-item"><h4>Résultats non courantes : {{ $resultatsNon }}</h4></li>
                    </ul>
                    <div><h3>Résultats : {{ $resultats }}</h3></div>
                    @else
                    <h1 style="color:red">Votre compte est en cours d'activation...</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
