@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->role <= 3)
                    <h1>You are logged in!</h1>
                    @else
                    <h1 style="color:red">Votre compte est en cours d'activation...</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
