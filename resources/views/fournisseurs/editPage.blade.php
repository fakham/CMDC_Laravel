@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier Fournisseur</div>

                    <div class="card-body">
                        <form method="POST" action="../../fournisseur/{{$fournisseur->id}}/update">
                            @csrf
                            <div class="input-group">
                                <input name="nom" class="form-control" type="text" placeholder="Nom Fournisseur..." value='{{ $fournisseur->nom }}'/>
                            </div>
                            <br>
                            <div class="input-group">
                                <textarea name="activite" class="form-control" placeholder="Activité..." rows="3">{{ $fournisseur->activite }}</textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <input name="region" class="form-control" type="text" placeholder="Region..." value='{{ $fournisseur->region }}'/>
                            </div>
                            <br>
                            <div class="input-group">
                                <input name="telephone" class="form-control" type="text" placeholder="Telephone..." value='{{ $fournisseur->telephone }}'/>
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
<script type="text/javascript">
    document.getElementById("activeProfile").classList.remove('active');
    document.getElementById("activeDashboard").classList.remove('active');
    document.getElementById("activeCharge").classList.remove('active');
    document.getElementById("activeRecette").classList.remove('active');
    document.getElementById("activeProgramme").classList.add('active');
</script>
@endsection