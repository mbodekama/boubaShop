<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Slide de présentation</h3>
        <p class="mt-2">Définissez les slides de votre site</p>
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
             action="{{route('AddSlide')}}"
             method="POST">
             @csrf
        <div class="form-group">
          <label for="name">Slide 1</label>
          <div class="custom-file">
           <input class="custom-file-input" id="customFile" type="file" name="slide1" required="required">
           <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name">Slide 2</label>
          <div class="custom-file">
           <input class="custom-file-input" id="customFile" 
            type="file" name="slide2">
           <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="name">Slide 3</label>
          <div class="custom-file">
           <input class="custom-file-input" id="customFile" 
                  type="file" name="slide3">
           <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

        <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>

        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiSlide" 
        type="submit">Valider</button>

        <button class="ml-1 btn btn-outline-danger rounded-capsule mr-1 mb-1 NoSlide" 
        type="submit">Annuler</button>


       </form>
      </div>

    </div>

  </div>

</div>

<script src="{{ asset('admin/assets/js/theme.js') }}">
</script>
<script type="text/javascript">
  $(".load").hide();
  $(".valiSlide").click(function(){
    $(".load").show();
  });
  $(".NoSlide").click(function(){
    $(".load").hide();
  });
</script>
