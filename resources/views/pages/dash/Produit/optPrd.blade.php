<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-0 text-primary"> <i class="far fa-file-archive"></i> Produit >  Ajout d'option
                  </h4>
                </div>
              </div>
            </div>
</div>

<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card">
  </div>

</div>


          <div class="row d-flex justify-content-center">

            <div class="col-lg-5 col-xl-4 pl-lg-2 mb-3 ">
            <form class="card h-lg-100" method="POST" id='attriForm' enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex flex-between-center bg-light py-2">
                  <h6 class="mb-0">Liste des options</h6>
                </div>
                <div class="card-body pb-0">
                  <div class="form-group">
                   <label for="taille">Taille</label>
                   <select class="selectpicker" id="taille" 
                   name="taille" >
                     <option value="1">Aucune </option>
                     @foreach(getAttriByType('taille') as $attr)
                     <option value="{{ $attr->id }}" type="{{ $attr->type }}">{{ $attr->libelle }} </option>
                     @endforeach
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="color">Couleur</label>
                   <select class="selectpicker" id="color" 
                   name="color" >
                     <option value="1">Aucune </option>
                     @foreach(getAttriByType('couleur') as $attr)
                     <option value="{{ $attr->id }}" type="{{ $attr->type }}" code={{ $attr->code }}>{{ $attr->libelle }}

                      </option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group d-none" id="imgPrd">
                    <label for="name" class="text-danger">
                      Image en couleur
                      <div class="badge badge-pill badge-primary fs--1" id="elmntColor" ><span class="far fa-dot-circle"></span>
                      </div>
                    </label>
                    <div class="custom-file">
                     <input class="custom-file-input" id="imgPrdByColor" 
                     type="file" name="imgPrdByColor" required="required">
                     <label class="custom-file-label text-primary" for="customFile">Choisir l'image
                     </label>
                    </div>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="epaisseur">Epaisseur</label>
                   <select class="selectpicker" id="epaisseur" 
                   name="epaisseur" >
                     <option value="1">Aucune </option>
                     @foreach(getAttriByType('epaisseur') as $attr)
                     <option value="{{ $attr->id }}" type="{{ $attr->type }}">{{ $attr->libelle }} </option>
                     @endforeach
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="pointure">Pointure</label>
                   <select class="selectpicker" id="pointure" 
                   name="pointure">
                     <option value="1">Aucune </option>
                     @foreach(getAttriByType('pointure') as $attr)
                     <option value="{{ $attr->id }}" type="{{ $attr->type }}">{{ $attr->libelle }} </option>
                     @endforeach
                   </select>
                  </div>
                  <hr class="border-200" />
                  <div class="form-group">
                   <label for="prix">Prix({{getTDevise()}})</label>
                   <input class="form-control" id="prix" type="number" min="1" placeholder="Prix produit" name="prix" required="required" value="{{ getTProdId($_SESSION['savePrd'])->first()->prix }}" >
                  </div>
                  {{-- <hr class="border-200" /> --}}
                  <div class="form-group">
                   <label for="qte">Quantité</label>
                   <input class="form-control" id="qte" type="number" min="1" placeholder="Stock disponible" name="qte" required="required" value="{{ getTProdId($_SESSION['savePrd'])->first()->quantite }}">
                  </div>
                </div>
                <div class="d-flex justify-content-start ">
                  <div class="spinner-border load d-none text-primary" role="status"><span class="sr-only">Loading...</span></div>
                  <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 valiProd">Valider</button>

                 {{--  <button class="ml-1 btn btn-outline-warning rounded-capsule mr-1 mb-1 empty"type="button">Annuler</button> --}}
                </div>
              </form>
            </div>

            <div class="col-lg-7 col-xl-8 pr-lg-2 mb-3">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                  <table class="table table-dashboard mb-0 table-borderless fs--1">
                    <thead class="bg-light">
                      <tr class="text-900">
                        <th class="" style="width: 12rem">Produit </th>
                        <th class="pr-card text-right" style="width: 4rem">Couleur</th>
                        <th class="pr-card text-right" style="width: 4rem">Taille</th>
                        <th class="pr-card text-right" style="width: 4rem">Epaisseur</th>
                        <th class="pr-card text-right" style="width: 4rem">Pointure</th>
                        <th class="pr-card text-right" style="width: 4rem">Quantité</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($_SESSION['optPrd']))
                      @foreach($_SESSION['optPrd'] as $opt)

                      <tr class="border-bottom border-200">
                        <td>
                          <div class="media align-items-center position-relative"><img class="rounded border border-200" src="{{ $opt['imgPrdByColor'] }}" width="60" alt="" />
                            <div class="media-body ml-3">
                              <h6 class="mb-1 font-weight-semi-bold"><a class="text-dark " href="#!">
                                {{ getTProdId($_SESSION['savePrd'])->first()->nom }}
                              </a></h6>
                              <p class="font-weight-semi-bold mb-0 text-500"> {{ $opt['prix'] }} {{getTDevise()}}</p>
                              <span class="badge badge rounded-capsule badge-soft-danger delOpt" id="{{ $loop->index }}"><span class="ml-1 fas fa-trash fs-1" data-fa-transform="shrink-2"></span>
                                  
                                </span>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right font-weight-semi-bold">
                          @if(getAttriById($opt['color'])->code != 'ND' )
                          <div class="avatar avatar-xl mr-3">
                            <div class="avatar-name rounded-circle  text-dark border border-dark" style="background-color: {{ getAttriById($opt['color'])->code  }}">
                              <span class="fs--1 text-primary"></span>
                            </div>
                          </div>
                          @else
                          <div class="avatar avatar-xl mr-3">
                            <div class="avatar-name rounded-circle   text-dark border border-dark" style="background-color: white">
                              <span class="fs--1 text-dark">
                                ND
                              </span>
                            </div>
                          </div>
                          @endif

                        </td>
                        <td class="align-middle text-right font-weight-semi-bold">{{ getAttriById($opt['taille'])->code }}</td>
                        <td class="align-middle text-right font-weight-semi-bold"> {{ getAttriById($opt['epaisseur'])->code }}</td>
                        <td class="align-middle text-right font-weight-semi-bold"> {{ getAttriById($opt['pointure'])->code }}</td>
                        <td class="align-middle text-right font-weight-semi-bold"> {{ $opt['qte'] }}</td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <div class="alert alert-warning"> Aunce option ajouter pour l'instant</div>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
                <div class="card-footer bg-light py-2">
                  <div class="row flex-center">
                    <button class="btn btn-success mr-1 mb-1 " id="saveOpt" type="button">Enregistrer les options</button>
                    <button class="btn btn-danger mr-1 mb-1" id="delAllOpt" type="button">Annuler les options<span class="fas fa-trash ml-1" data-fa-transform="shrink-3"></span>
                    </button>

                  </div>
                </div>
              </div>
            </div>
          </div>





<script src="{{ asset('admin/assets/js/theme.js') }}">
</script>


<script type="text/javascript">
  $(function()
  {
    //Loader btn
      $(".valiProd").click(function(event)
        {
          event.preventDefault();
          $(".load").attr('class','spinner-border load d-none');


          var formData = new FormData(document.getElementById("attriForm"));
             $.ajax({
               url:'/addOpt',
               method:'POST',
               data:formData,
               dataType:'json',
               success:function(){
              $('#main_content').load("/optPrd");
                },
               cache : false,
               processData : false,
               contentType : false,
               error:function(){
                    toastr.error('Problème de connexion');
                }
             });


        });


    //Choix de couleur 
      $('#color').change(function()
      {
          if($('#color option:selected').val() != 1 )
          {
            var choix  = $('#color option:selected').attr('code');
            $('#elmntColor').css('background-color',choix);
            $('#imgPrd').attr('class','form-group ml-2');

          }
          else
          {
            $('#imgPrd').attr('class','form-group ml-2 d-none');
          }
      })
    //Suprimer une option

    $('.delOpt').click(function()
    {
      var data = $(this).attr('id');
        Swal.fire({
          title: 'Supression ',
          text: "Voulez vous reelement suprimer ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Oui,suprimer!'
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                url:'delOpt',
                method:'GET',
                data:{idEle:data},
                dataType:'json',
                success:function(data)
                {
                  $('#main_content').load("/optPrd");
                },
                error:function()
                {
                toastr.error('Erreur ');
                }
              });
          }
        })

    })

  //Suppression de toutes les options
    $('#delAllOpt').click(function()
    {
      var data = $(this).attr('id');
        Swal.fire({
          title: 'Supression ',
          text: "Voulez vous annuler l'ajout des options ?",
          icon: 'danger',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Oui,suprimer!'
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                url:'delAllOpt',
                method:'GET',
                data:{action:1},
                dataType:'json',
                success:function(data)
                {
                  $('#main_content').load("/pubProd");
                },
                error:function()
                {
                toastr.error('Erreur ');
                }
              });
          }
        })

    })

  //Clique sur Valider
        $('#saveOpt').click(function()
        {
         const ipAPI = '/saveOpt';

         Swal.queue([{
          title: 'Enregistrement',
          confirmButtonText: 'J\'enregistre',
          confirmButtonColor: '#FFC750',
          text:'Processus d\'enregistrement',
          showLoaderOnConfirm: true,
          preConfirm: () => {
            return fetch(ipAPI)
              .then(response => response.json())
              .then(data => testMe(data))
              .catch(() => {
                Swal.insertQueueStep({
                  icon: 'error',
                  title: 'Erreur lors du paiement !!!'
                })
              })
          }
         }])

        });

    // Méthode
        function testMe(data)
          {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Options enregistrées avec succès',
              showConfirmButton: false,
              timer: 1500
            })
            $('#main_content').load("/pubProd");
          }




  })

</script>





