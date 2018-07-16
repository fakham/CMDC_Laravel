@extends('../layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2 class="title"><b>CPC Périodique</b></h2>
                </div>

                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Date Début
                                </h3>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <input type="date" id="date_debut" onclick="(this.type='date')" class="form-control border-input" onchange="changeData()">
                                        <span class="input-group-addon ">
                                        <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Date Fin</h3>
                                <div class="form-group">
                                    <div class="input-group date">
                                        <input type="date" id="date_fin" onclick="(this.type='date')" class="form-control border-input" onchange="changeData()">
                                        <span class="input-group-addon ">
                                        <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Intitulé Type Charges</th>
                                        <th>Montant</th>
                                        <th>Intitulé Type Recette</th>
                                        <th>Montant</th>

                                    </tr>
                                </thead>
                                <tbody id="cpc">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Totale Charges</label>
                                    <input type="text" id="totalCharges" disabled="true" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Total Recettes</label>
                                    <input type="text" id="totalRecettes" disabled="true" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Résultat Période</label>
                                    <input type="text" id="total" disabled="true" class="form-control border-input">
                                </div>
                            </div>



                        </div>

                        <div class="row">

                        </div>


                    </form>
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
    document.getElementById("activeProgramme").classList.remove('active');
    document.getElementById("activeCPC").classList.add('active');
    
    $(document).ready(function() {

        $.ajax({
               type:'GET',
               url:'/cpc/filter',
               //data: {'_token:  <?php echo csrf_token() ?>'},
               data: {dateD:'', dateF:''},
               success:function(d){
                   var resp = "";
                   var max = d.charges.length >= d.recettes.length ? d.charges.length : d.recettes.length;
                   var totalCharges = 0.0, totalRecettes = 0.0;

                    for (var i = 0; i < max; i++) {
                        resp += "<tr>";

                        if (i >= d.charges.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.charges[i].type + "</td>";
                            resp += "<td>" + d.charges[i].montant + "</td>";
                            totalCharges += parseFloat(d.charges[i].montant);
                        }

                        if (i >= d.recettes.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.recettes[i].type + "</td>";
                            resp += "<td>" + d.recettes[i].montant + "</td>";
                            totalRecettes += parseFloat(d.recettes[i].montant);
                        }

                        resp += "</tr>";
                    }
                    
                    $('#totalCharges').val(totalCharges);
                    $('#totalRecettes').val(totalRecettes);
                    $('#total').val(totalRecettes - totalCharges);

                    $('#cpc').html(resp);
               }
        });

    });

    function changeData() {
        var debut = $('#date_debut').val();
        var fin = $('#date_fin').val();

        $.ajax({
               type:'GET',
               url:'/cpc/filter',
               //data: {'_token:  <?php echo csrf_token() ?>'},
               data: {dateD:debut, dateF:fin},
               success:function(d){
                   var resp = "";
                   var max = d.charges.length >= d.recettes.length ? d.charges.length : d.recettes.length;
                   var totalCharges = 0.0, totalRecettes = 0.0;

                    for (var i = 0; i < max; i++) {
                        resp += "<tr>";

                        if (i >= d.charges.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.charges[i].type + "</td>";
                            resp += "<td>" + d.charges[i].montant + "</td>";
                            totalCharges += parseFloat(d.charges[i].montant);
                        }

                        if (i >= d.recettes.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.recettes[i].type + "</td>";
                            resp += "<td>" + d.recettes[i].montant + "</td>";
                            totalRecettes += parseFloat(d.recettes[i].montant);
                        }

                        resp += "</tr>";
                    }
                    
                    $('#totalCharges').val(totalCharges);
                    $('#totalRecettes').val(totalRecettes);
                    $('#total').val(totalRecettes - totalCharges);

                    $('#cpc').html(resp);
               }
        });
    }

</script>
@endsection