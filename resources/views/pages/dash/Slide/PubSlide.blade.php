<div class="card mb-3">
  <div class="card-body">
    <div class="row justify-content-between align-items-center">
      
      <div class="col-sm-auto mb-2 mb-sm-0">
        <h6 class="mb-0"><b>Slide publiées</b></h6>
      </div>

    </div>
    


  </div>
</div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
               @foreach($slide as $sld)
               
                <div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="#">
                        <img class="img-fluid rounded-top" 
                        src="{{$sld->fichier}}" alt="" /></a><span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      {{-- <div><a class="btn btn-sm btn-falcon-default delslide"
                        href="#!" data-toggle="tooltip" 
                        id="{{$sld->id}}" 
                        data-placement="top" title="Supprimer le slide"><span class="fas fa-trash text-danger"></span></a></div> --}}
                    </div>
                  </div>
                </div>

                <div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="#">
                        <img class="img-fluid rounded-top" 
                        src="{{$sld->fichier2}}" alt="" /></a><span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      {{-- <div><a class="btn btn-sm btn-falcon-default delslide"
                        href="#!" data-toggle="tooltip" 
                        id="{{$sld->id}}" 
                        data-placement="top" title="Supprimer le slide"><span class="fas fa-trash text-danger"></span></a></div> --}}
                    </div>
                  </div>
                </div>

                <div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="#">
                        <img class="img-fluid rounded-top" 
                        src="{{$sld->fichier3}}" alt="" /></a><span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                     {{--  <div><a class="btn btn-sm btn-falcon-default delslide"
                        href="#!" data-toggle="tooltip" 
                        id="{{$sld->id}}" 
                        data-placement="top" title="Supprimer le slide"><span class="fas fa-trash text-danger"></span></a></div> --}}
                    </div>
                  </div>
                </div>

               @endforeach
              </div>
            </div>

<script type="text/javascript">
  $(".delslide").click(function(){
    var id = $(this).attr("id");
    Swal.fire({
     title: 'Slide publié',
     text: "Voulez-vous supprimer ce slide ?",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#d33',
     cancelButtonColor: '#3085d6',
     cancelButtonText: 'Annuler',
     confirmButtonText: 'oui , Supprimer!',
     backdrop: `rgba(240,15,83,0.4)`
    }).then(
      (result)=>{
        if (result.value)
        {
          $.ajax({
           url:'delSlide',
           method:'GET',
           data:{idSlide:id},
           dataType:'text',
           success:function(){
            Swal.fire(
             'Supression!',
             'Supprimé avec succès',
             'success'
            );
            $('#main_content').load("/pubSlide");
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
</script>