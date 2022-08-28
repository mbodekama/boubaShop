<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Mes Nouvelles commandes</h3>
        <p class="mt-2">
          Liste des commandes
        </p>
      </div>
    </div>
  </div>

</div>

<div class="card">
            <div class="card-header">
              <div class="row align-items-center justify-content-between">
                <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">
                    
                  </h5>
                </div>
                <div id="mytoken">
                  @csrf
                </div>
                
                
              </div>
            </div>
            <div class="card-body p-0">
              <div class="falcon-data-table">
                <table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200" data-options='{"searching":true,"responsive":false,"pageLength":20,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="align-middle no-sort pr-3">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-customers-select" type="checkbox" data-checkbox-body="#customers" data-checkbox-actions="#customers-actions" data-checkbox-replaced-element="#customer-table-actions" />
                          <label class="custom-control-label" for="checkbox-bulk-customers-select"></label>
                        </div>
                      </th>
                      <th class="align-middle sort">N° Commande</th>
                      <th class="align-middle sort pl-5">Date commande
                      </th>
                      <th class="align-middle sort pl-5">Montant({{ getTDevise() }})</th>
                      <th class="align-middle sort pl-5">Paiement</th>
                      <th class="align-middle sort pl-5">Etat</th>
                      <th class="align-middle sort pl-5">Actions</th>
                      {{-- <th class="align-middle no-sort"></th> --}}
                    </tr>
                  </thead>
                  <tbody id="customers">

                    @foreach($comd as $cmd)
                                       
                    <tr class="btn-reveal-trigger">

                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="customer-checkbox-0" />
                          <label class="custom-control-label" for="customer-checkbox-0"></label>
                        </div>
                      </td>

                      <td class="py-2 align-middle white-space-nowrap customer-name-column">
                        <a href="#">
                          <div class="media d-flex align-items-center">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">
                                {{$cmd->numComd}}
                              </h5>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="py-2 align-middle pl-5">
                       {{$cmd->created_at}}
                      </td>

                      <td class="py-2 align-middle white-space-nowrap pl-5">
                       {{$cmd->montant." ".getTDevise()}}
                      </td>

                      <td class="py-2 align-middle white-space-nowrap pl-5">
                       @if($cmd->paiement==1)
                        <span class="badge badge-pill badge-secondary"> A la livraison
                        </span>
                       @else
                        <span class="badge badge-pill badge-secondary"> Avant la livraison
                        </span>
                       @endif
                      </td>

                       <td class="py-2 align-middle white-space-nowrap pl-5">
                       @if($cmd->solde==0)
                        <span class="badge badge-pill badge-danger">
                          non soldé
                        </span>
                       @else
                        <span class="badge badge-pill badge-success">soldé
                        </span>
                       @endif
                      </td>


                      
                      <td class="align-middle pl-5">


                        <button title="détails" class="btn btn-falcon-default btn-sm btnEye" 
                                id="{{$cmd->comdID}}" 
                                client="{{$cmd->nom." ".$cmd->prenom}}"
                                idclient = "{{$cmd->client_id}}"
                                tel="{{$cmd->numero_telephone}}"
                                pays="{{$cmd->pays}}"
                                ville="{{$cmd->ville}}"
                                lieu="{{$cmd->lieuLivraison}}"
                                mail="{{$cmd->mail}}"
                                numcmd ="{{$cmd->numComd}}"
                                type="button">
                                <span class="far fa-eye text-warning" data-fa-transform="shrink-3 down-2"></span>
                        </button>

                        <button title="livrer" class="btn btn-falcon-default btn-sm btnship" 
                         id="{{$cmd->comdID}}" 
                         numcmd ="{{$cmd->numComd}}"
                         type="button">
                           <span class="fas fa-shipping-fast  text-info" data-fa-transform="shrink-3 down-2"></span>
                        </button>

                        <button class="btn btn-falcon-default btn-sm btnnoComd" 
                         id="{{$cmd->comdID}}" 
                         numcmd ="{{$cmd->numComd}}"
                         type="button">
                           <span title="réfuser" 
                           class="fas fa-times  text-danger" data-fa-transform="shrink-3 down-2"></span>
                        </button>


                        <button title="supprimer" class="btn btn-falcon-default btn-sm btnDel" 
                         id="{{$cmd->comdID}}" 
                         numcmd ="{{$cmd->numComd}}"
                         type="button">
                           <span class="far fa-trash-alt  text-danger" data-fa-transform="shrink-3 down-2"></span>
                        </button>

                        

                        
                      </td>

                    </tr>

                    @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<!-- Modal de visualisation et de modification  -->
<div class="modal modal-fixed-right fade" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
     
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalRightLabel">Modal Right</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body py-5">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-1 clientMd">
                    Anthony Hopkins
                  </h4>
                  
                  <p class="text-500">
                   Tel: <b><span class="telMd"></span></b><br>
                   Mail: <b><span class="mailMd"></span></b><br>
                   Pays : <b><span class="paysMd"></span></b><br>
                   Ville :<b><span class="villeMd"></span></b><br>
                   Lieu :<b><span class="lieuMd"></span></b><br>
                  </p>
                  
                </div>
             </div>
             <hr class="border-dashed border-bottom-0">
         <p class="mt-4">
          
          <h5 class="mb-1 text-danger">
            Produits commandés
          </h5>
           
             <a class="border-bottom-0 notification rounded-0 
               border-x-0 border-300 produitMd" href="#!">
                
             </a>

            

         </p>
     
       
      </div>

    </div>
  </div>
</div>


<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
<script type="text/javascript">
  // Visualisation de la commande
  $(".btnEye").click(function(){
   var id     = $(this).attr("id");
   var client = $(this).attr("client");
   var idclnt = $(this).attr("idclient"); 
   var tel    = $(this).attr("tel");
   var pays   = $(this).attr("pays");
   var ville  = $(this).attr("ville");
   var lieu   = $(this).attr("lieu");
   var mail   = $(this).attr("mail");
   var numcd  = $(this).attr("numcmd");
    $("#exampleModalRightLabel").text("N°: "+numcd);
    $(".clientMd").text(client);
    $(".telMd").text(tel);
    $(".mailMd").text(mail);
    $(".paysMd").text(pays);
    $(".villeMd").text(ville);
    $(".lieuMd").text(lieu);

    $.ajax({
      url:'comdListe',
      method:'GET',
      data:{idclient:idclnt,numcd:numcd,},
      dataType:'html',
      success:function(data){
       $(".produitMd").html(data);
       $("#exampleModalRight").modal("show");
      },
      error:function(data){
        console.log("error");
      }
    });

    
  });

  // Suppression des commandes
   $(".btnDel").click(function(){
     var id = $(this).attr("id");
     var numcmd = $(this).attr("numcmd");
      Swal.fire({
       title: 'Commandes',
       text: "Voulez-vous supprimer cette commandes ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , Supprimer!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then(
         (result)=>{
          if (result.value) {
            $.ajax({
             url:'delComd',
             method:'GET',
             data:{id:id,numcmd:numcmd},
             dataType:'text',
             success:function(){
                Swal.fire(
                 'Supression!',
                 'Supprimé avec succès',
                 'success'
                );
                $('#main_content').load("/newComd");
             },
             error:function(){
               Swal.fire(
                 'Supression!',
                 'erreur de suppression',
                 'error'
                );
             }
            });
          }

         }
      );
   });

  // Réfuser la commande
  $(".btnnoComd").click(function(){
     var id = $(this).attr("id");
     var numcmd = $(this).attr("numcmd");
      Swal.fire({
       title: 'Commandes',
       text: "Voulez-vous refusez cette commandes ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , refuser!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then(
         (result)=>{
          if (result.value) {
            $.ajax({
             url:'refusComd',
             method:'GET',
             data:{id:id,numcmd:numcmd},
             dataType:'text',
             success:function(){
                Swal.fire(
                 'Commandes!',
                 'refuser avec succès',
                 'success'
                );
                $('#main_content').load("/newComd");
             },
             error:function(){
               Swal.fire(
                 'Commandes!',
                 'erreur de refus',
                 'error'
                );
             }
            });
          }

         }
      );
  });

  // Livrer la commande
  $(".btnship").click(function(){
     var id = $(this).attr("id");
     var numcmd = $(this).attr("numcmd");
      Swal.fire({
       title: 'Commandes',
       text: "Voulez-vous livrer cette commande ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , livrer!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then(
         (result)=>{
          if (result.value) {
            $.ajax({
             url:'shipComd',
             method:'GET',
             data:{id:id,numcmd:numcmd},
             dataType:'text',
             success:function(){
                Swal.fire(
                 'Commandes!',
                 'livrer avec succès',
                 'success'
                );
                $('#main_content').load("/newComd");
             },
             error:function(){
               Swal.fire(
                 'Commandes!',
                 'erreur de suppression',
                 'error'
                );
             }
            });
          }

         }
      );
  });

</script>

