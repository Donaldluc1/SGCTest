@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body text-center " style="border: 2px solid green">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="btn-group d-block mb-2">
                        <button type="button" style="border: 2px solid green" class="btn  btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          BANQUES
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @forelse ($banques as $item)
                            <button class="dropdown-item banque_id" data-id="{{$item->id}}" type="button">{{$item->nom}}</button>
                            @empty
                            <button class="dropdown-item" type="button">Aucune Banque</button>
                            @endforelse
                        </div>
                    </div>
                    <div class="btn-group d-block mb-2">
                        <button type="button" style="border: 2px solid green" class="btn  btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          CLIENTS  
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="clientData">
                          
                        </div>
                    </div>
                    <div class="btn-group d-block mb-2">
                        <button type="button" style="border: 2px solid green" class="btn  btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          COMPTES
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="compteData">
                          
                        </div>
                    </div>
                    <br>
                    <input id="soldeIn" style="border: 2px solid green" type="text" class="form-control mb-2" placeholder="Entrer le Solde">
                      <button type="button" class="btn btn-primary btn-lg" id="btn_save">Enregistrer</button>
                </div>
            </div>
            <div id="result"></div>
        </div>
    </div>
</div>

<script src="/assets/jquery-3.2.1.slim.min.js"></script>
<script>
    $(document).ready(function(){
        var chosenBank;
        var chosenClient;
        var chosenCompte;
        $(".banque_id").click(function() {
            var output = '';
            chosenBank = $(this).data("id");
            var banque_id = $(this).data("id");
            var datas = { banque_id};

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/allclients",
                type: 'POST',
                data: datas,
                success: function(data){

                    if(data.length != 0){

                        $.each(data, function(i, k){
                            output += "<button data-id='"+ k.id +"' class='dropdown-item client_id' type='button'>"+ k.nom +"</button>"
                        })

                        $('#clientData').html();
                        $('#clientData').html(output);
                    }
                }
            })
        });

        $(document).on('click', '.client_id', function() {
            var output = '';
            var client_id = $(this).data("id");
            chosenClient = $(this).data("id");
            var datas = { client_id, chosenBank};

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "/allAccountsClients",
                type: 'POST',
                data: datas,
                success: function(data){
                    console.log(data);
                    if(data.length != 0){

                        $.each(data, function(i, k){
                            output += "<button data-id='"+ k.id +"' class='dropdown-item compte_id' type='button'>"+ k.libelle +"</button>"
                        })

                        $('#compteData').html();
                        $('#compteData').html(output);
                    }
                }
            })
            
        });

        $(document).on('click', '.compte_id', function() {
            chosenCompte = $(this).data("id");
        })

        $('#btn_save').click(function() {
            var solde = $('#soldeIn').val();
            var output = '';
            if(chosenBank|| chosenClient|| chosenCompte || solde){
                var datas = {
                    chosenBank,
                    chosenClient,
                    chosenCompte,
                    solde
                }

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: "/setSoldeAccount",
                        type: 'POST',
                        data: datas,
                        success: function(data){
                            $.each(data, function(i, k){
                                output += "<p>Numéro de compte : "+ k.libelle +"<br> Solde : "+ k.solde +"</p>";
                            })
                            $('#result').html();
                            $('#result').html(output);
                        }
                        
                    })

                               
            }else{
                alert('Veuiller selectionner respectivement une banque, un client, un compte et entrer le solde')
            }
        });
    });
</script>

@endsection
