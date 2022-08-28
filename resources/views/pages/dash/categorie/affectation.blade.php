<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Nouvelle Affectation</h3>
        <p class="mt-2">Catégorie - Sous-catégorie</p>
      </div>
    </div>
  </div>

</div>

<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card">
  </div>


  <div class="card-body">

    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Configuration{{-- {{dd($catgscatg)}} --}}</h3>
        <p class="mt-2">Remplir le formulaire ci-dessous</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
       <form enctype="multipart/form-data"
             action="{{route('AddProd')}}"
             method="POST">
             @csrf

        <div class="form-group">
         <label for="catg">Catégorie</label>
         <select class="selectpicker" id="catg" 
         name="catg" required="required">
           <option>catégorie</option>
            @foreach($catgL as $catg)
             <option value="{{$catg->id}}">
              {{$catg->categorie}}
             </option>
            @endforeach
         </select>
        </div>

        <div class="form-group">
         <label for="scatg">Sous-catégorie</label>
         <select class="selectpicker" id="scatg" 
         name="catg" required="required">
           <option>Sous-catégorie</option>
            @foreach($scatgL as $scatg)
             <option value="{{$scatg->id}}">
              {{$scatg->libele}}
             </option>
            @endforeach
         </select>
        </div>


        <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>
        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiProd"type="button">Valider</button>

        <button class="ml-1 btn btn-outline-danger rounded-capsule mr-1 mb-1 empty"type="button">Annuler</button>

       </form>
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
                      <th class="align-middle sort pl-8">Catégorie</th>
                      <th class="align-middle sort pl-8">Sous-Catégorie</th>
                      <th class="align-middle sort pl-8">Date</th>
                     {{--  <th class="align-middle sort pl-10">Actions</th> --}}
                      
                    </tr>
                  </thead>
                  <tbody id="customers">

                   @foreach($catgscatg as $catg)
                                       
                    <tr class="btn-reveal-trigger">
                     
                      <td class="py-2 align-middle white-space-nowrap">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="customer-checkbox-0" />
                          <label class="custom-control-label" for="customer-checkbox-0"></label>
                        </div>
                      </td>

                      <td class="pl-8 py-2 align-middle white-space-nowrap customer-name-column "><a href="#">
                          <div class="media d-flex align-items-center">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">
                                {{$catg->categorie}}
                              </h5>
                            </div>
                          </div>
                        </a>
                      </td>

                       <td class="pl-8 py-2 align-middle white-space-nowrap customer-name-column "><a href="#">
                          <div class="media d-flex align-items-center">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">
                                {{$catg->libele}}
                              </h5>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="pl-8 py-2 align-middle">
                       <span class="badge badge-pill badge-success">
                          {{$catg->created_at}}
                       </span>
                      </td>
                      
                      
                      {{-- <td class="align-middle pl-10">
                      	<a href="#">
                         <button class="btn btn-falcon-default btn-sm btnDel"
                           id="{{$catg->id}}" type="button">
                           <span class="far fa-trash-alt  text-danger" data-fa-transform="shrink-3 down-2"></span>
                         </button>
                        </a>

                      </td> --}}

                    </tr>

                   @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
    </div>

  </div>

</div>

<script src="{{ asset('admin/assets/js/theme.js') }}">
</script>
<script type="text/javascript">
  $(".load").hide();



  $(".empty").click(function(){
    $(".load").hide();
    $("#prod").val("");
    $("#prix").val("");
    $("#descrp").val("");
    console.log("vider le formulaire");
  });

  $(".valiProd").click(function(){
    $(".load").show();
    var catg  = $("#catg option:selected").val();
    var scatg = $("#scatg option:selected").val(); 
    console.log("catg:"+catg+" scatg:"+scatg);
    $.ajax({
    	url:'addcatgScatg',
    	method:'get',
    	data:{catg:catg,scatg:scatg},
    	dataType:'text',
    	success:function(){
    		$(".load").hide();
    		$('#main_content').load("/CatgSCatg");
    	    Swal.fire(
             'Affectation catg-scatg',
             'Ajouté avec succès',
             'success'
            );

    	},
    	error:function(){
    		console.log("error");
    	}
    });
  });

  
  

</script>

