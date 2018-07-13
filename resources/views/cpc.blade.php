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
                                    <div class="input-group date" id="datetimepicker6">
                                        <input type="date" onclick="(this.type='date')" class="form-control ">
                                        <span class="input-group-addon ">
                                        <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Date Fin</h3>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker6">
                                        <input type="date" onclick="(this.type='date')" class="form-control ">
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
                                    <input type="text" id="total" disabled="true" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Total Recettes</label>
                                    <input type="text" id="total" disabled="true" class="form-control border-input">
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

                    for (var i = 0; i < max; i++) {
                        resp += "<tr>";

                        if (i >= d.charges.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.charges[i].type + "</td>";
                            resp += "<td>" + d.charges[i].montant + "</td>";
                        }

                        if (i >= d.recettes.length) {
                            resp += "<td></td><td></td>";
                        } else {
                            resp += "<td>" + d.recettes[i].type + "</td>";
                            resp += "<td>" + d.recettes[i].montant + "</td>";
                        }

                        resp += "</tr>";
                    }

                    $('#cpc').html(resp);
               }
        });

    });

</script>
@endsection