<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Nouvelle catégorie de produit</h3>
        <p class="mt-2">Définissez les différentes catégories de vos produits</p>
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
        <p class="mt-2">Remplir le formulaire ci-dessous : vêtement hommes, vêtement femmes, chaussure hommes, chaussure femmes</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
       <form>

        <div class="form-group">
          <label for="name">Catégorie</label>
           <input class="form-control" id="catg" type="text" 
           placeholder="catégorie">
        </div>

        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 addCatg"type="button">Valider</button>


       </form>
      </div>

    </div>

  </div>

</div>

<script type="text/javascript">
  $(".addCatg").click(function(){
    var catg = $("#catg").val();
    //Contrôlle des données
    if (catg=='') {
      Swal.fire(
       'Formulaire incorrecte',
       'Indiquer une catégorie',
       'error'
      )
    }else{
      $.ajax({

       url:'AddCatg',
       method:'GET',
       data:{catg:catg},
       dataType:'text',
       success:function(){
        Swal.fire(
          'Catégorie',
          'Ajouté avec succès',
          'sucess'
        )
        $('#main_content').load("/listeCatg");
       },
       error:function(){console.log("erreur de zone")}

      });
    }
  });
</script>