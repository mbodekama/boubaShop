<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../admin/assets/img/illustrations/corner-4.png);">
  </div>


  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Paramétrages</h3>
        <p class="mt-2">Configurer les coordonnées d'accès au back-office</p>
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
        <div class="card-header position-relative 
         min-vh-25 mb-7">
              <div class="bg-holder rounded-soft rounded-bottom-0" style="
              background-image:
              url(admin/assets/img/generic/51.jpg);">
              </div>
              <!--/.bg-holder-->
            @foreach($setting as $setg)
              <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{$setg->logo}}" width="200" alt="" />
              </div>
            @endforeach
            </div>
       <form enctype="multipart/form-data"
             action="{{route('UpdParam')}}"
             method="POST">
             @csrf

        @foreach($setting as $setg)

        <div class="form-group">
          <label for="logo">Logo - Taille: 204x80</label>
          <div class="custom-file">
           <input class="custom-file-input" id="logo" 
           type="file" name="logo">
           <label class="custom-file-label" for="customFiles">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label for="site">Nom du site</label>
           <input class="form-control" id="site" type="text"name="site" value="{{$setg->site}}">
        </div>

        <div class="form-group">
          <label for="year"> Année Copyright</label>
           <input class="form-control" id="year"
            type="text" value="{{$setg->year}}" name="year">
        </div>

        <div class="form-group">
          <label for="name">Dévises</label>
           <input class="form-control" id="devise" 
            type="text" value="{{$setg->devises}}" 
            name="devise">
        </div>

        <div class="form-group">
          <label for="tel">Téléphone</label>
           <input class="form-control" id="tel" type="text" 
           name="tel" value="{{$setg->tel}}">
        </div>

        <div class="form-group">
          <label for="lieu">Localisation</label>
           <input class="form-control" id="lieu" type="text"name="lieu" 
           value="{{$setg->lieu}}">
        </div>

        <div class="form-group">
          <label for="heur">Horaire de travail</label>
           <input class="form-control" id="heur" 
             type="text" name="heur" value="{{$setg->heur}}">
        </div>


        <div class="form-group">
          <label for="mail">Mail</label>
           <input class="form-control" id="mail" type="text"name="mail" value="{{$setg->mail}}">
        </div>

        <div class="form-group">
          <label for="pass">Password</label>
           <input class="form-control" id="pass"
            type="text" value="{{$setg->pass}}" name="pass">
        </div>

        <div class="form-group">
          <label for="plays">Lien Playstore</label>
           <input class="form-control" id="plays"
            type="text" value="{{$setg->plays}}" 
            name="plays">
        </div>

        <div class="form-group">
          <label for="faceb">Lien Facebook</label>
           <input class="form-control" id="faceb"
            type="text" value="{{$setg->faceb}}" 
            name="faceb">
        </div>


       <div class="form-group">
        <label for="exampleFormControlTextarea1">
          Qui sommes-nous ?
        </label>
        <textarea class="form-control" id="about" rows="3" 
        name="about">{{$setg->about}}</textarea>
       </div>

       
       <div class="spinner-border load" role="status"><span class="sr-only">Loading...</span></div>

        <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 validParams" type="submit">Valider
        </button>

       @endforeach


       </form>
      </div>

    </div>

  </div>

</div>
<script src="{{ asset('admin/assets/js/theme.js') }}">
</script>
<script type="text/javascript">
  $(".load").hide();
  $(".validParams").click(function(){
    $(".load").show();
  });
</script>