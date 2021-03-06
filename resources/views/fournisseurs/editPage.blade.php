@extends('../layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier Fournisseur</h4>
                </div>
                <div class="content">
                    <form method="POST" action="../../fournisseur/{{$fournisseur->id}}/update">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nom Fournisseur</label>
                                    <input name="nom" type="text" class="form-control border-input" value="{{ $fournisseur->nom }}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Activité</label>
                                    <textarea name="activite" rows="5" class="form-control border-input">{{ $fournisseur->activite }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Region</label>
                                    <input name="region" type="text" class="form-control border-input" value="{{ $fournisseur->region }}"> 
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input name="telephone" type="phone" class="form-control border-input" value="{{ $fournisseur->telephone }}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center ">
                            <button class="btn btn-default">Enregistrer </button>
                            <button class="btn btn-danger">Annuler </button>
                        </div>

                    </form>
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