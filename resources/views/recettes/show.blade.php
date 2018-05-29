@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Modifier ou supprimer votre recettes</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Client</th>
                            <th>Prix</th>
                        </thead>
                        <tbody>
                        @foreach ($recettes as $recette)
                        <tr>
                            <td>{{ $recette->date }}</td>
                            <td>{{ $recette->produit }}</td>
                            <td>{{ $recette->client }}</td>
                            <td>{{ $recette->prix * $recette->qtte }}</td>
                            <td><a class="btn btn-info" href="/recettes/{{ $recette->id }}/edit">Modifier</a></td>
                            <td><a class="btn btn-danger" href="/recettes/{{ $recette->id }}/delete" onclick="return confirm('Voulez-vous supprimer cette recette?')">Supprimer</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript">
    document.getElementById("activeProfile").classList.remove('active');
    document.getElementById("activeDashboard").classList.remove('active');
    document.getElementById("activeCharge").classList.remove('active');
    document.getElementById("activeRecette").classList.add('active');
    document.getElementById("activeProgramme").classList.remove('active');

    $(document).ready(function() {

        @if (app('request')->input('added'))
            $.notify({
                icon: 'ti-arrow-circle-down',
                message: "<b>Recette added successfully.</b>"

            }, {
                type: 'success',
                timer: 4000
            });
        @elseif (app('request')->input('modified'))
            $.notify({
                icon: 'ti-pencil',
                message: "<b>Recette modified successfully.</b>"

            }, {
                type: 'info',
                timer: 4000
            });
        @elseif (app('request')->input('deleted'))
            $.notify({
                icon: 'ti-trash',
                message: "<b>Recette deleted successfully.</b>"

            }, {
                type: 'danger',
                timer: 4000
            });
        @endif

    });


</script>

@endsection