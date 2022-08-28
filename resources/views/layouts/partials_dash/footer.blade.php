           <footer class="no-print">
            <div class="row no-gutters justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">
                  {{getSite()}} | Tous droits réservés <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> {{ getYear() }} &copy; <a href="mailto:info@meneya.com">By 
                  {{getSite()}}</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.2.0</p>
              </div>
            </div>
          </footer>
        </div>

      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    SPINNER DE CHARGEMENT  -->

<div class="animation text-center invisible mt-5" id="animationDiv">

  <div>
  <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-secondary" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-success" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-info" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-warning" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-danger" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-light" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-dark" role="status">
    <span class="sr-only">Loading...</span>
  </div>

</div>
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/js/popper.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/lib/@fortawesome/all.min.js"></script>
    <script src="admin/assets/lib/stickyfilljs/stickyfill.min.js"></script>
    <script src="admin/assets/lib/sticky-kit/sticky-kit.min.js"></script>
    <script src="admin/assets/lib/is_js/is.min.js"></script>
    <script src="admin/assets/lib/lodash/lodash.min.js"></script>
    <script src="admin/assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <script src="admin/assets/lib/prismjs/prism.js"></script>
    <script src="admin/assets/lib/chart.js/Chart.min.js"></script>
    <script src="admin/assets/lib/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/assets/lib/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="admin/assets/lib/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="admin/assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
    <script src="admin/assets/lib/leaflet/leaflet.js"></script>
    <script src="admin/assets/lib/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="admin/assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="admin/assets/lib/echarts/echarts.min.js"></script>
    <script src="admin/assets/lib/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/lib/owl.carousel/owl.carousel.js"></script>
    <script src="admin/assets/lib/dropzone/dropzone.min.js"></script>
    <script src="admin/assets/lib/tinymce/tinymce.min.js"></script>
    <script src="admin/assets/lib/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/assets/lib/flatpickr/flatpickr.min.js"></script>
    <script src="admin/assets/lib/plyr/plyr.polyfilled.min.js"></script>
    <script src="admin/assets/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="admin/assets/js/theme.js"></script>
    <script src="admin/assets/js/sweetalert2.min.js"></script>
    <script src="admin/assets/lib/select2/select2.min.js"></script>

    
    

<script src="admin/assets/lib/toastr/toastr.min.js"></script>



    <!-- ===============================================-->
    <!--    MES PROPRES SCRIPTS-->
    <!-- ===============================================-->
    <script type="text/javascript">
      // Fonction de scrollage
       function scrollContent()
       {

            var offset = $('#infoSucc').offset().top;
            $('html, body').animate({scrollTop: offset}, 'slow');
       }

      // Fonction de chargement
      function loadingScreen()
      {
                toastr.options.progressBar = true;
                toastr.info('Chargement en cours ...'); 
        $('#main_content').html($('#animationDiv').attr('class', 'animation text-center'));
                toastr.options.progressBar = false;


      }

//Gestion de sous-catégorie
 $("#newsCatg").click(function(){
    $('#main_content').load("/newSCatg");
 });

 $("#listesSCatg").click(function(){
   $('#main_content').load("/listeSCatg");
 });

 $("#CatgSCatg").click(function(){
    $('#main_content').load("/CatgSCatg");
 });


//Function getPrice Ajax
  function formatPriceJs(price,collerIci)
  {
    $.ajax({
        url:'/mbo/formatPriceJs',
        method:'GET',
        data:{prix:price},
        dataType:'text',
        success:function(data){
          collerIci.text(data);

          },
        error:function(){
          toastr.error('Problème de connexion internet');
          }
    });



  }

 


    </script>


    
    <script src="{{ asset('admin/assets/js/js_route.js') }}"></script>

 

  </body>

</html>