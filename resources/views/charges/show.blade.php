@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier ou supprimer votre charges</h4>

                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Fournisseur</th>
                            <th>Prix</th>
                        </thead>
                        <tbody>
                        @foreach ($charges as $charge)
                        <tr>
                            <td>{{ $charge->date }}</td>
                            <td>{{ $charge->produit }}</td>
                            <td>{{ $charge->fournisseur }}</td>
                            <td>{{ $charge->prix * $charge->qtte }}</td>
                            <td><a class="btn btn-info" href="/charges/{{ $charge->id }}/edit">Modifier</a></td>
                            <td><a class="btn btn-danger" href="/charges/{{ $charge->id }}/delete" onclick="return confirm('Voulez-vous supprimer ce charge?')">Supprimer</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("activeProfile").classList.remove('active');
    document.getElementById("activeDashboard").classList.remove('active');
    document.getElementById("activeCharge").classList.add('active');
    document.getElementById("activeRecette").classList.remove('active');
    document.getElementById("activeProgramme").classList.remove('active');
</script>

@endsection