@include('layouts.partials_dash.header')

@include('layouts.partials_dash.navbar')

    <!-- ===============================================-->
    <!--   DEBUT DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

    <div id="main_content">
         @include('pages.dash.index')
    </div>




    <!-- ===============================================-->
    <!--   FIN DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->



@include('layouts.partials_dash.footer')
@if(isset($savePrd) &&  $savePrd !=0)
<script type="text/javascript">
$(function()
{
Swal.fire({
  title: 'Ajout d\'option au produit',
  text: "Voulez vous ajouter des options (Couleur, taille, pointure ...) au produit enregistré ?",
  icon: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui ajouter',
  cancelButtonText: 'Non, pas d\'option'
  // closeOnClickOutside: false,
  // onClose: DeleteUnsavedImages()
}).then((result) => {
  if (result.isConfirmed) {

  	$('#main_content').load("/optPrd");
  }
  else
  {
              $.ajax({
                url:'delSession',
                method:'GET',
                data:{session:'savePrd'},
                dataType:'json',
                success:function(data)
                {
                  $('#newProd').click();
                },
                error:function()
                {
                toastr.error('Erreur ');
                }
              });

  }
})
})
</script>
@endif