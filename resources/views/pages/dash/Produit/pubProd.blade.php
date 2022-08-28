<div class="card mb-3">
  <div class="card-body">
    <div class="row justify-content-between align-items-center">
      
      <div class="col-sm-auto mb-2 mb-sm-0">
        <h6 class="mb-0">Liste des produits publiés </h6>
      </div>

      <div class="col-sm-auto">
        <form class="d-inline-block mr-3">
          <div class="input-group input-group-sm d-flex align-items-center"><h5 class="mr-1"><b>Catégorie: </b></h5>
            <select class="custom-select catg" aria-label="Bulk actions" 
             name="catg">
             <option value="0">Tous produits</option>
              @foreach($catgL as $catg)
               <option value="{{$catg->id}}">
                <b>{{$catg->categorie}}</b>
               </option>
              @endforeach
            </select>
          </div>
        </form>
      </div>



    </div>
    
    <div class="form-group">
      <label for="name"></label>
      <input class="form-control" id="produit" type="text" placeholder="Nom Produit">
    </div>

  </div>
</div>
      

          <div class="card mb-3">
           
            <div class="card-body">
              <div class="row produitCont">
               @foreach($prod as $prd)
                <div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                        <a class="d-block" href="#">
                          <img class="img-fluid rounded-top" 
                          src="{{$prd->img}}" 
                          alt="" /></a>
                        <span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0">
                          <a class="text-dark" href="#">
                          {{$prd->nom}}
                          </a>
                        </h5>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                          {{$prd->prix}} cfa
                        </h5>
                        <p class="fs--1 mb-3"><a class="text-500" 
                          href="#!">{{$prd->description}}</a></p>
                        
                        
                       
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      <div>

                        <a class="btn btn-sm btn-falcon-default mr-2 editProd" href="#!" data-toggle="tooltip"  
                         data-placement="top" 
                         title="Modifier le produit" 
                         nomprod="{{$prd->nom}}"
                         prixprod="{{$prd->prix}}"
                         descrprod="{{$prd->description}}"
                         imgprod="{{$prd->img}}"
                         id="{{$prd->id}}">
                         <span class="far fa-edit"></span>
                        </a>

                       <a class="btn btn-sm btn-falcon-default text-primary eyeProd" href="#!" data-toggle="tooltip" data-placement="top" title="Bloqué le produit" id="{{$prd->id}}"><span class="far fa-eye-slash"></span>
                       </a>
                       <a class="btn btn-sm btn-falcon-default text-danger delProd" href="#!" data-toggle="tooltip" data-placement="top" title="Supprimer le produit" id="{{$prd->id}}"><span class="fas fa-trash"></span>
                       </a>

                      </div>

                    </div>
                  </div>
                </div>
               @endforeach
              </div>
            </div>
            
          </div>

<!-- Modal de mise à jour du produit  -->
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
               <label for="name">Nom</label>
                <input class="form-control" id="nomMd" type="text">
              </div>

              <div class="form-group">
               <label for="name">Prix</label>
                <input class="form-control" id="prixMd" type="number">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">
                 Description de votre produit
                </label>
                <textarea class="form-control" id="descrpMd" rows="3" 
                  name="descrp"></textarea>
              </div>

              <input type="hidden" id="idprod">

            </form>
         </p>
        <button class="btn btn-danger updProd">Modifier</button>
       
      </div>

    </div>
  </div>
</div>
<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
<script type="text/javascript">
  
  // Filtrage par catégorie
   $("select.catg").change(function(){
     var catg = $(this).children("option:selected").val();
     if (catg==0) {
       $('#main_content').load("/pubProd");
     }
     else{
       $.ajax({
        url:'catgProd',
        method:'GET',
        data:{catg:catg},
        dataType:'html',
        success:function(data){
          $(".produitCont").html(data);
        },
        error:function(){
          console.log(data);
        }
       });
     }
   });

  // Filtrer le produit en fonction du nom
   $("#produit").keyup(function(){
     var produit = $("#produit").val();
     if (produit=='') {
       $('#main_content').load("/pubProd");
     }else{
      $.ajax({
        url:'SingleProd',
        method:'GET',
        data:{produit:produit},
        dataType:'html',
        success:function(data){
          $(".produitCont").html(data);
        },
        error:function(){
          console.log(data);
        }
      });
     }
   });

  // Suppression du produit
   $(".delProd").click(function(){
      var idProd = $(this).attr("id");
      Swal.fire({
       title: 'Produit publié',
       text: "Voulez-vous supprimer ce produit ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , Supprimer!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then((result)=>{
        if (result.value) {
          $.ajax({
           url:'delProd',
           method:'GET',
           data:{idProd:idProd},
           dataType:'text',
           success:function(){
            Swal.fire(
             'Supression!',
             'Supprimé avec succès',
             'success'
            );
            $('#main_content').load("/pubProd");
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
        
      });
   });

  // BLoquer le produit
   $(".eyeProd").click(function(){
     var idProd = $(this).attr("id");
      Swal.fire({
       title: 'Produit publié',
       text: "Voulez-vous bloqué ce produit ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , bloqué!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then((result)=>{
        if (result.value) {
          $.ajax({
          url:'bloqueProd',
          method:'GET',
          data:{idProd:idProd},
          dataType:'text',
          success:function(){
            Swal.fire(
             'Produit publié!',
             'bloqué avec succès',
             'success'
            );
            $('#main_content').load("/pubProd");
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
        
      });
   });

  // Mise à jour du produit
  $(".editProd").click(function(){
   var nomprod   = $(this).attr('nomprod');
   var prixprod  = $(this).attr('prixprod');
   var descrprod = $(this).attr('descrprod');
   var imgprod   = $(this).attr('imgprod');
   var id        = $(this).attr('id');
   $("#exampleModalRightLabel").text(nomprod);
   $("#nomMd").val(nomprod);
   $("#prixMd").val(prixprod);
   $("#descrpMd").val(descrprod);
   $("#idprod").val(id);
   $("#exampleModalRight").modal("show");
  });

  $(".updProd").click(function(){
    var nomPrd   = $("#nomMd").val();
    var idProd   = $("#idprod").val();
    var prixProd = $("#prixMd").val();
    var descProd = $("#descrpMd").val();
    Swal.fire({
       title: 'Produit publié',
       text: "Voulez-vous modifier ce produit ?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#d33',
       cancelButtonColor: '#3085d6',
       cancelButtonText: 'Annuler',
       confirmButtonText: 'oui , modifer!',
       backdrop: `rgba(240,15,83,0.4)`
      }).then((result)=>{
        if (result.value) {
          $.ajax({
          url:'updProd',
          method:'GET',
          data:{nomPrd:nomPrd,idProd:idProd,prixProd:prixProd,descProd:descProd},
          dataType:'text',
          success:function(){
            Swal.fire(
             'Produit!',
             'Modifier avec succès',
             'success'
            );
          },
          error:function(){
           Swal.fire(
            'Produit!',
            'Erreur de Modification',
            'error'
           );
          }
        });
        }
        
      });
  });



  


</script>

      