<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Mes clients</h3>
        <p class="mt-2">
          Liste de mes clients
        </p>
      </div>
      <div class="col-lg-4">
        <button class="refresh btn btn-falcon-default rounded-capsule mr-1 mb-1"  type="button">
           <span class="far fa-compass mr-1" 
            data-fa-transform="shrink-3"></span>Actualiser
        </button>
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
                      <th class="align-middle sort">Nom</th>
                      <th class="align-middle sort pl-5">Prénom</th>
                      <th class="align-middle sort pl-5">Pays</th>
                      <th class="align-middle sort pl-5">Mail</th>
                       <th class="align-middle sort pl-5">Date</th>
                      <th class="align-middle sort pl-10">Actions</th>
                      {{-- <th class="align-middle no-sort"></th> --}}
                    </tr>
                  </thead>
                  <tbody id="customers">

                   @foreach($clients as $client)  

                    <tr class="btn-reveal-trigger">

                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="customer-checkbox-0" />
                          <label class="custom-control-label" for="customer-checkbox-0"></label>
                        </div>
                      </td>

                      <td class="py-2 align-middle white-space-nowrap customer-name-column"><a href="#">
                          <div class="media d-flex align-items-center">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">
                                {{$client->nom}}
                              </h5>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="py-2 align-middle pl-5">
                         {{$client->prenom}}
                      </td>

                      <td class="py-2 align-middle white-space-nowrap pl-5">
                       {{$client->pays}}
                      </td>

                      <td class="py-2 align-middle white-space-nowrap pl-5">
                       {{$client->mail}}
                      </td>

                      <td class="py-2 align-middle white-space-nowrap pl-5">
                       {{$client->created_at}}
                      </td>
                     
                      
                      
                      <td class="align-middle pl-10">

                        <button class="btn btn-falcon-default 
                                btn-sm btnEye" 
                                id="{{$client->id}}" 
                                domcMd  = "{{$client->domicile}}"
                                villeMd = "{{$client->ville}}"
                                tel     = "{{$client->numero_telephone}}"
                                pass    = "{{$client->pass}}"
                                nom     = "{{$client->nom}}" 
                                prenom  = "{{$client->prenom}}"
                                type    = "button">

                                <span class="far fa-eye text-success" data-fa-transform="shrink-3 down-2">
                                </span>
                        </button>


                        <button class="btn btn-falcon-default btn-sm btnDel" 
                                 id="{{$client->id}}" type="button">
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

<!-- Modal de mise à jour du client  -->
<div class="modal modal-fixed-right fade" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical" role="document">
    <div class="modal-content border-0 min-vh-100">
     
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalRightLabel">Modal Right</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body py-5">
        
        <img class="img-fluid" 
          src="{{asset('admin/assets/img/illustrations/modal-right.png')}}" alt="">
         <p class="mt-4">
           <form>

              <div class="form-group">
               <label for="domcMd">Domicile</label>
                <input class="form-control" id="domcMd" type="text">
              </div>

              <div class="form-group">
               <label for="villeMd">Ville</label>
                <input class="form-control" id="villeMd" type="text">
              </div>

              <div class="form-group">
               <label for="tel">Téléphone</label>
                <input class="form-control" id="tel" type="text">
              </div>

              <div class="form-group">
               <label for="pass">Mot de Passe</label>
                <input class="form-control" id="pass" type="text">
              </div>


              <input type="hidden" id="idclient">

            </form>
         </p>
        <button class="btn btn-danger updClient">Modifier</button>
       
      </div>

    </div>
  </div>
</div>

<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
<script type="text/javascript">

// Supprimer un client
 $(".btnDel").click(function(){
    var idclient = $(this).attr('id');
    Swal.fire({
     title: 'Client',
     text: "Voulez-vous supprimer ce client ?",
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
            url:'delClient',
            method:'GET',
            data:{idclient:idclient},
            dataType:'text',
            success:function(){
              Swal.fire(
               'Supression!',
               'Supprimé avec succès',
               'success'
              );
              $('#main_content').load("/listClient");
            },
            error:function(){
              Swal.fire(
               'Supression!',
               'Erreur de suppression',
               'error'
              );
            }
          });
        }
      }
    );
 }); 

// Visuliser et modifier un client
  $(".btnEye").click(function(){
    var idClient = $(this).attr("id");
    var domcMd   = $(this).attr("domcMd");
    var villeMd  = $(this).attr("villeMd");
    var tel      = $(this).attr("tel");    
    var pass     = $(this).attr("pass");
    var nom      = $(this).attr("nom");
    var prenom   = $(this).attr("prenom");
    $("#exampleModalRightLabel").text(nom+" "+prenom);
    $("#domcMd").val(domcMd);
    $("#villeMd").val(villeMd);
    $("#tel").val(tel);
    $("#pass").val(pass);
    $("#idclient").val(idClient);
    $("#exampleModalRight").modal("show");
  });
  $(".updClient").click(function(){
    var domcile  = $("#domcMd").val();
    var villeM   = $("#villeMd").val();
    var tel      = $("#tel").val();
    var pass     = $("#pass").val();
    var idclient = $("#idclient").val();
    Swal.fire({
      title: 'Produit publié',
      text: "Voulez-vous modifier ce client ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      cancelButtonText: 'Annuler',
      confirmButtonText: 'oui , modifer!',
      backdrop: `rgba(240,15,83,0.4)`
    }).then(
      (result)=>{
        if (result.value)
        {
          $.ajax({
            url:'updClient',
            method:'GET',
            data:{domcile:domcile,villeM:villeM,tel:tel,pass:pass,idclient:idclient},
            dataType:'Text',
            success:function(){
              Swal.fire(
               'Client!',
               'Modifier avec succès',
               'success'
              );
            },
            error:function(){
              Swal.fire(
               'Client!',
               'Erreur de Modification',
               'error'
              );
            }
          });
        }
      }
    );

  });

// Refresh 
$(".refresh").click(function(){
   $('#main_content').load("/listClient");
});

</script>
