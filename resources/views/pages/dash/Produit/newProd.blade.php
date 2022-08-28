<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Nouveau produit</h3>
        <p class="mt-2">Enregistrer un nouveau produit</p>
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
        <h3 class="mb-0">Configuration</h3>
        <p class="mt-2">Remplir le formulaire ci-dessous</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
       <form enctype="multipart/form-data"
             action="{{route('AddProd')}}"
             method="POST">
             @csrf

        <div class="row">
        <div class="form-group col-6">
         <label for="basic-example">Catégorie</label>
         <select class="selectpicker" id="basic-example" 
         name="catg" required="required">
           {{-- <option value="1"> catégorie</option> --}}
            @foreach($catgL as $catg)
             <option @if($catg->id==1) selected @endif value="{{$catg->id}}">
              {{$catg->categorie}}
             </option>
            @endforeach
         </select>
        </div>

        <div class="form-group col-6">
          <label for="name">Nom du produit</label>
           <input class="form-control" id="prod" type="text" placeholder="Produit" name="produit" 
           required="required">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-6">
          <label for="name">Prix(cfa)</label>
           <input class="form-control" id="prix" type="number" placeholder="Prix" name="prixProd" 
           required="required">
        </div>
        <div class="form-group col-4">
          <label for="qte">Faux prix </label>
           <input class="form-control" id="fakePrice" type="number" placeholder="Combien en avez vous ?" name="fakePrice" 
           required="required" value="0">
        </div>
        <div class="form-group col-2">
          <label for="qte">% de réduction</label>
           <input class="form-control" id="percent" type="text" disabled placeholder="pourcentage" name="percent" 
           required="required">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="qte">Quantité du produit</label>
           <input class="form-control" id="qte" type="number" placeholder="Combien en avez vous ?" name="qte" 
           required="required">
        </div> 
        <div class="form-group col-6">
          <label for="name">Image principale</label>
          <div class="custom-file">
           <input class="custom-file-input" id="imageP" 
           type="file" name="imageP" required="required">
           <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
        </div>



       <div class="form-group">
        <label for="exampleFormControlTextarea1">
          Description de votre produit
        </label>
        <textarea class="form-control" id="descrp" rows="3" 
        name="descrp"></textarea>
       </div>

      <div class="row">
        <div class="form-group col-6">
          <label for="name">Image détaillés :: Image 1</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image1" 
           type="file" name="image1">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>

        <div class="form-group col-6">
          <label for="name">Image détaillés :: Image 2</label>
          <div class="custom-file">
           <input class="custom-file-input" id="image2" 
           type="file" name="image2">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>
      </div>

      
      <center>
        <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>
        <button class="col-md-6 ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiProd"type="submit">Valider</button>
        <button class="col-md-3 ml-1 btn btn-outline-danger rounded-capsule mr-1 mb-1 empty"type="button">Annuler</button>
      </center>

       </form>
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
  });


  // $('#prix').keyup(function()
  // {

  //   $('#fakePrice').val($('#prix').val());


  // })

  $('#fakePrice').keyup(function()
  {
    let prix = $('#prix').val();
    let fakePrice = $('#fakePrice').val();
    let percent = (100 * prix)/fakePrice;

    $('#percent').val(percent+' %');
  })
  

  // Declechement des verifs lors du chargement de l'image
  //   var monImage = $('#imageP');
  //   monImage.addEventListener('change', (event) => 
  //     {
  //       verifTaille(monImage,905,764);
  //     });
  //   monImage.change(function(event)
  //   {
  //     verifTaille(monImage,905,764);

  //   })

</script>

