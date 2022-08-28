<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Zone de livraison</h3>
        <p class="mt-2">Définissez vos zones de livraison et Configurer les coûts</p>
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
        <p class="mt-2">Remplir le formulaire ci-dessous: *Eviter les caractères spéciaux(è,é,à ...)</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
       <form>

        <div class="form-group">
          <label for="name">Pays</label>
           <input class="form-control" id="pays" type="text" placeholder="Pays">
        </div>

        <div class="form-group">
          <label for="name">Ville/commune</label>
           <input class="form-control" id="ville" type="text" placeholder="Ville">
        </div>

        <div class="form-group">
          <label for="name">Coût de livraison</label>
           <input class="form-control" id="cout" type="text" placeholder="coût">
        </div>


        <div class="form-group">
          <label for="name">Délais de livraison (en Heure)</label>
           <input class="form-control" id="delais" type="number"  placeholder="délais exprimer en Heure" min="1" >
        </div>
        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 addZone" 
        type="button">Valider</button>

       </form>
      </div>

    </div>

  </div>

</div>

<script type="text/javascript">
  $(function(){

    // Ajouter une nouvelle zone
      $(".addZone").click(function(){
        
        // Récupération des donnes
         var pays  = $("#pays").val();
         var ville = $("#ville").val();
         var cout  = $("#cout").val();
         var delais  = $("#delais").val();

        // Contrôlle des données
         if (pays=='') {
           Swal.fire(
             'Formulaire incorrecte',
             'Indiquer le pays',
             'error'
           )
         }else if (ville=='') {
          Swal.fire(
             'Formulaire incorrecte',
             'Indiquer la ville',
             'error'
           )
         }else if (cout=='') {
          Swal.fire(
             'Formulaire incorrecte',
             'Indiquer le coût de livraison',
             'error'
           )
         }else{
           $.ajax({
            
             url:'AddZone',
             method:'GET',
             data:{ville:ville,pays:pays,cout:cout,delais:delais},
             dataType:'text',
             success:function(){
              $('#main_content').load("/listeZone");
             },
             error:function(){console.log("erreur de zone")}

           });
         }

      });

  });
</script>