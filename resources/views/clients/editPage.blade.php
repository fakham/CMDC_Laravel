@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Client</div>

                    <div class="card-body">
                        <form method="POST" action="../../client/{{$client->id}}/update">
                            @csrf
                            <div class="input-group">
                                <input name="nom" class="form-control" type="text" placeholder="Nom Client..." value='{{ $client->nom }}'/>
                            </div>
                            <br>
                            <div class="input-group">
                                <textarea name="activite" class="form-control" placeholder="Activité..." rows="3">{{ $client->activite }}</textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <input name="region" class="form-control" type="text" placeholder="Region..." value='{{ $client->region }}'/>
                            </div>
                            <br>
                            <div class="input-group">
                                <input name="telephone" class="form-control" type="text" placeholder="Telephone..." value='{{ $client->telephone }}'/>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-default" value="Enregistrer"/>
                            <a type="button" class="btn btn-danger" href="/programmer">Annuler</a>
                        </form>
                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection