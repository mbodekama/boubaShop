<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Catégories</h3>
        <p class="mt-2">
          Les différentes catégorie de vos produits
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
                      <th class="align-middle sort">Catégorie</th>
                      <th class="align-middle sort pl-10">Date</th>
                      <th class="align-middle sort pl-10">Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody id="customers">

                   @foreach($catgL as $catg)
                                       
                    <tr class="btn-reveal-trigger">
                     
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="customer-checkbox-0" />
                          <label class="custom-control-label" for="customer-checkbox-0"></label>
                        </div>
                      </td>

                      <td class="py-2 align-middle white-space-nowrap customer-name-column "><a href="#">
                          <div class="media d-flex align-items-center">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">
                                {{$catg->categorie}}
                              </h5>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="py-2 align-middle pl-10">
                       <span class="badge badge-pill badge-success">
                          {{$catg->created_at}}
                       </span>
                      </td>
                      
                      
                      <td class="align-middle pl-10">


                        {{-- <button class="btn btn-falcon-default btn-sm btnEdit" 
                                id="" type="button">
                                <span class="far fa-edit text-warning" data-fa-transform="shrink-3 down-2"></span>
                        </button> --}}

                        <button class="btn btn-falcon-default btn-sm btnDel" id="{{$catg->id}}" type="button">
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

<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
<script type="text/javascript">
  $(".btnDel").click(function(){
    var idCatg =  $(this).attr("id");
    Swal.fire({
       title: 'Suppression',
       text: "Voulez-vous supprimer cette catégorie ?",
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
             url:'delCatg',
             method:'GET',
             data:{idCatg:idCatg},
             dataType:'text',
             success:function(){
                Swal.fire(
                 'Supression!',
                 'Supprimé avec succès',
                 'success'
                );
               $('#main_content').load("/listeCatg");
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
      })
  });
</script>

