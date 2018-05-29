@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Table Produits</h4>
                    <p class="category"></p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Nom</th>
                            <th>Description</th>


                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->description }}</td>
                                <td><a type="button" class="btn btn-default" href="produit/{{ $produit->id }}/edit">Modifier</a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le produit (\'{{ $produit->nom }}\')?')" href="produit/{{ $produit->id }}/delete">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Table Fournisseurs</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>Nom</th>
                                <th>Telephone</th>

                            </thead>
                            <tbody>
                                @foreach ($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{ $fournisseur->nom }}</td>
                                    <td>{{ $fournisseur->telephone }}</td>
                                    <td><a type="button" class="btn btn-default" href="fournisseur/{{ $fournisseur->id }}/edit">Modifier</a></td>
                                    <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le fournisseur (\'{{ $fournisseur->nom }}\')?')" href="fournisseur/{{ $fournisseur->id }}/delete">Supprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Table Clients</h4>
                    <p class="category"></p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Nom</th>
                            <th>Telephone</th>

                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->nom}}</td>
                                <td>{{$client->telephone}}</td>
                                <td><a type="button" class="btn btn-default" href="client/{{ $client->id }}/edit">Modifier</a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer le client (\'{{ $client->nom }}\')?')" href="client/{{ $client->id }}/delete">Supprimer</a></td>
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
    document.getElementById("activeRecette").classList.remove('active');
    document.getElementById("activeProgramme").classList.add('active');

    $(document).ready(function() {

        @if (app('request')->input('produit') == "added")
            $.notify({
                icon: 'ti-arrow-circle-down',
                message: "<b>Produit added successfully.</b>"

            }, {
                type: 'success',
                timer: 4000
            });
        @elseif (app('request')->input('produit') == "modified")
            $.notify({
                icon: 'ti-pencil',
                message: "<b>Produit modified successfully.</b>"

            }, {
                type: 'info',
                timer: 4000
            });
        @elseif (app('request')->input('produit') == "deleted")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Produit deleted successfully.</b>"

            }, {
                type: 'danger',
                timer: 4000
            });
        @elseif (app('request')->input('client') == "added")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Client added successfully.</b>"

            }, {
                type: 'success',
                timer: 4000
            });
        @elseif (app('request')->input('client') == "modified")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Client modified successfully.</b>"

            }, {
                type: 'info',
                timer: 4000
            });
        @elseif (app('request')->input('client') == "deleted")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Client deleted successfully.</b>"

            }, {
                type: 'danger',
                timer: 4000
            });
        @elseif (app('request')->input('fournisseur') == "added")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Fournisseur added successfully.</b>"

            }, {
                type: 'success',
                timer: 4000
            });
        @elseif (app('request')->input('fournisseur') == "modified")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Fournisseur modified successfully.</b>"

            }, {
                type: 'info',
                timer: 4000
            });
        @elseif (app('request')->input('fournisseur') == "deleted")
            $.notify({
                icon: 'ti-trash',
                message: "<b>Fournisseur deleted successfully.</b>"

            }, {
                type: 'danger',
                timer: 4000
            });
        @endif

    });
</script>

@endsection