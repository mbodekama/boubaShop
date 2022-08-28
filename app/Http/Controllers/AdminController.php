<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Mail;
use Hash;
use Illuminate\Http\Request;
use App\Model\Livraison;
use App\Model\Pays;
use App\Model\Categorie;
use App\Model\Souscategorie;
use App\Model\catg_has_scatg;
use App\Model\Ville;
use App\Model\Produit;
use App\Model\Image;
use App\Model\Client;
use App\Model\Commande;
use App\Model\Produits_has_client;
use App\Model\produits_has_attributs;
use App\Model\Slide;
use App\Model\setting;
use App\Model\stock_prd;
use App\Model\img_prd_by_color;
use App\Model\attributs;

use Schema;
use Str;


class AdminController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */


  // Propriee (attribu de la classe)
    //  !!!!!!!!!!!!!!!!  Lien des image  !!!!!!!!!!!!!!!! 
      public $folderLink;
    //  !!!!!!!!!!!!!!!!  Lien des image  !!!!!!!!!!!!!!!! 

    public function __construct()
    {
       $this->folderLink = env('LIEN_FILE');
       $this->middleware('auth');
    }

	public function dashboard()
	{
    $idPrd =0;
    if (isset($_SESSION['savePrd'])) 
    {
      $idPrd = $_SESSION['savePrd'];
    }
		return view('dash')->with('savePrd',$idPrd);

	}

// Gestion de produit
	public function newProd()
	{
		
		$catgL = categorie::all()->sortByDesc('id');
    $scatgL = souscategorie::all()->sortByDesc('id');
		return view('pages.dash.Produit.newProd')
		       ->with('catgL',$catgL)
           ->with('scatgL',$scatgL);
	}

  //Recuperation d'image selon couleur
  public function choixColor(Request $request)
  {
    $idColor = $request->idColor;
    $idPrd = $request->idPrd;


    //Recuperation de l'image 
      $img = img_prd_by_color::where('produits_id',$idPrd)->where('attributs_id',$idColor)->first();
    //Information sur les attributs du prd
      $mesAttrPrd = getProdAtrb($idPrd);
          $epaisseurEl =  $mesAttrPrd->where('type','epaisseur')->unique();
          $pointureEl =  $mesAttrPrd->where('type','pointure')->unique();
          $tailleEl =  $mesAttrPrd->where('type','taille')->unique();

          //Recherche de la segond propriéte apres couleur
          if(!($epaisseurEl->isEmpty()))
          {
            $type ='epaisseur';
            $attr = $epaisseurEl;
          }
          elseif(!$tailleEl->isEmpty())
          {
            $type ='taille';
            $attr = $tailleEl;
          }
          elseif (!($pointureEl->isEmpty())) 
          {
            $type = 'pointure';
            $attr = $pointureEl;
          }
          else
          {
            $type= 'Aucun autre attribut';
            //Retourne l'image et le stock
            $prdStock = stock_prd::where('produits_id','=',$idPrd)->where('couleur','=',$idColor)
                                    ->where('taille','=','1')->where('pointure','=','1')
                                    ->where('epaisseur','=','1')->first();
                    //Retour de l'id stock en js
                      $output ='<script type="text/javascript">$("#idPrdStock").val('.$prdStock->id.')</script>';

                       if ($prdStock->qte ==0)
                        {
                          $output .= '<div class="alert alert-warning" role="alert">
                                                   <b>STOCK<span class="alert-link"> : rupture</a></b>
                                                  </div>';
                        }
                        else
                        {
                          $output .= '<div class="alert alert-success" role="alert">
                         <b>STOCK : <span class="qte" id="myQte">'.$prdStock->qte.'</a></b> 
                        </div>';
                        }

                        return response()->json(['lien'=>$img->lien,'stock'=>$output,"nextOpt"=>'']);
          }

    //Selection de qte dans stock
      $prdStock = stock_prd::where('produits_id','=',$idPrd)->where('couleur','=',$idColor)->get();
      $attr = $prdStock->where($type,'!=',1);
       $qte = $prdStock->sum('qte');

       //Retour de action au click du btn ajouter
            $stockCode ='<script type="text/javascript">$("#buy").click(function(){if($("#idPrdStock").val() == "") {Swal.fire("Veuillez choisir une '.$type.'")}})</script>';
      //Actualisation stock
          if ($qte ==0)
          {
            $stockCode .= '<div class="alert alert-warning" role="alert"><b>STOCK
                          <span class="alert-link"> : rupture</a></b</div>';
          }
          else
          {
            $stockCode .= '<div class="alert alert-success" role="alert">
                        <b>STOCK : <span class="qte" id="myQte">'.$qte.'</a></b></div>';
          }
      //Mis a jour de l'attribut suivant
      $output = ''; 
      $output.='<div class="form-group">';
        $output.='<div class="d-flex justify-content-between align-items-center pb-1">';
          $output.='<label class="font-weight-medium" for="nexAttr">'.$type.' :</label><a class="nav-link-style font-size-sm" href="#size-chart"><i class="czi-ruler lead align-middle mr-1 mt-n1"></i></a></div>';
        $output.='<select class="custom-select" required id="nexAttr">';
          $output.='<option value="1">-- Choix --</option>';                      
              foreach ($attr as $ele)
              {$output.='<option value="'.$ele->$type.'">'.getAttriById($ele->$type)->libelle.'</option>';}
        $output.='</select></div><input type="hidden" id="typeAttr" value="'.$type.'">';

    $output.="<script type='text/javascript'>
    $('#nexAttr').change(function()
      {
      var idColor = ".$idColor.";
      var idPrd   = $('#myPrdId').val();
      var idAttr  = $( '#nexAttr option:selected' ).val();
      var typeAttr = $('#typeAttr').val();
      $.ajax({
        url:'geToption',
        method:'GET',
        data:{idprod:idPrd,idColor:idColor,idAttr:idAttr,typeAttr:typeAttr},
        dataType:'json',
        success:function(data){
          $('#idPrdStock').val(data.stockId);
          $('#msgStock').html(data.stockHtml);
        },
        error:function(data){
           console.log('data');
        }
      });

    })</script>";


          return response()->json(['lien'=>$img->lien,'stock'=>$stockCode,"nextOpt"=>$output]);

  }

  //Return les valeur en fonctions des attributs
  public function geToption(Request $request)
  {
    // Réception des données
      $idAttr   = $request->idAttr;
      $typeAttr = $request->typeAttr;
      $idprod   = $request->idprod;
      $idColor  = $request->idColor;

      $prdStock = stock_prd::where('produits_id','=',$idprod)
                              ->where('couleur','=',$idColor)
                              ->where($typeAttr,'=',$idAttr)->first();

                       if ($prdStock->qte==0)
                        {
                          $stockHtml = '<div class="alert alert-warning" role="alert">
                                                   <b>STOCK<span class="alert-link"> : rupture</b>
                                                  </div>';
                        }
                        else
                        {
                          $stockHtml = '<div class="alert alert-success" role="alert">
                         <b>STOCK : <span class="qte" id="myQte">'.$prdStock->qte.'</b> 
                        </div>';
                        }

          return response()->json(['stockHtml'=>$stockHtml,'stockId'=> $prdStock->id]);  




  }

	public function AddProd(Request $request)
	{
    $idsctg = $request->scatg;
    $lien = $this->folderLink;
         
        // Récupération images
          Schema::disableForeignKeyConstraints(); 
          if(!empty($request->file('imageP')))
          {
          	// Récupération du name file  
          	 $imgP = $request->file('imageP');

          	// dossier de stockage
          	 $path = $imgP->store('imgProd','public');

          	// Chemin d'accès de l'image 
          	 $imageP = $lien.$path;

            //Redimensionnement image
              // resize_img($imageP,$imageP); 

          	// Infos images
             $infos=[
               'nom'=>$request->produit,
               'slug' => Str::slug($request->produit).'.html',
               'prix'=>$request->prixProd,
       				 'fakePrice'=>$request->fakePrice,
       				 'img'=>$imageP,
       				 'description'=>$request->descrp,
       				 'categorie_id'=>$request->catg,
               'idsctg'=>$idsctg,
               'quantite'=>$request->qte,
       				 'statut'=>1
       				];
              //dd($infos);
       		    $idProd = produit::create($infos);
       		
          }else{
          	$imageP ="";
          }



          if(!empty($request->file('image1')) )
          {
          	// Récupération du name file  
          	 $image1 = $request->file('image1');

          	// dossier de stockage
          	 $path = $image1->store('imgProd','public');

          	// Chemin d'accès de l'image 
          	 $imageF1 = $lien.$path;

          	// Données
          	 $dataImg1 = ['images'=>$imageF1,
          				 'produits_id'=>$idProd->id,
          				 'produits_categorie_id'=>$request->catg
          				];

          	// Enregistrement
          	 $img1 = image::create($dataImg1);
          	 

          }else{
          	$imageF1 ="";
          }

          if(!empty($request->file('image2')) )
          {
          	// Récupération du name file  
          	 $image2 = $request->file('image2');

          	// dossier de stockage
          	 $path = $image2->store('imgProd','public');

          	// Chemin d'accès de l'image 
          	 $imageF2 = $lien.$path;

          	// Données
          	 $dataImg2 = ['images'=>$imageF2,
          				 'produits_id'=>$idProd->id,
          				 'produits_categorie_id'=>$request->catg
          				];
            
          	// Enregistrement
          	 $img2 = image::create($dataImg2);
          	 
          }else{
          	$imageF2 ="";
          }

          if(!empty($request->file('image3')) )
          {
          	// Récupération du name file  
          	 $image3 = $request->file('image3');

          	// dossier de stockage
          	 $path = $image3->store('imgProd','public');

          	// Chemin d'accès de l'image 
          	 $imageF3 = $lien.$path;

          	// Données
          	 $dataImg3 = ['images'=>$imageF3,
          				 'produits_id'=>$idProd->id,
          				 'produits_categorie_id'=>$request->catg
          				];

          	// Enregistrement
          	 $img3 = image::create($dataImg3);

          }else{
          	$imageF3 ="";
          }

          if(!empty($request->file('image4')) )
          {
          	// Récupération du name file  
          	 $image4 = $request->file('image4');

          	// dossier de stockage
          	 $path = $image4->store('imgProd','public');

          	// Chemin d'accès de l'image 
          	 $imageF4 = $lien.$path;

          	// Données
          	 $dataImg4 = ['images'=>$imageF4,
          				 'produits_id'=>$idProd->id,
          				 'produits_categorie_id'=>$request->catg
          				];

          	// Enregistrement
          	 $img1 = image::create($dataImg4);

          }else{
          	$imageF4 ="";
          }

          if (isset($idProd)) 
          {
             $_SESSION['savePrd'] = $idProd->id;
          }
           return redirect('/dashboard');


	}

  //Ajout d'option au produit 
  public function optPrd()
  {
    // unset($_SESSION['optPrd']);
    return view('pages.dash.Produit.optPrd');
  }
  //Validation des options ajouter 
  public function saveOpt()
  {
    $idPrd =  $_SESSION['savePrd'];
    //Enregistrement des valeurs
      //Parcourt de la session
      foreach ($_SESSION['optPrd'] as  $ele) 
      {
       
       //Enregistrement dans produits has attribut 
         //Pour les tailees
           if($ele['taille'] != '1')
           {

              $dataProd_attrib = ['produits_id'=>$idPrd,
                        'attributs_id'=>$ele['taille'],
                       ];
               produits_has_attributs::create($dataProd_attrib);
           }
         //Pour les pointure
           if($ele['pointure'] != '1')
           {
                $dataProd_attrib = ['produits_id'=>$idPrd,
                        'attributs_id'=>$ele['pointure'],
                       ];
                 produits_has_attributs::create($dataProd_attrib);
           }
         //Pour les epaisseurs
           if($ele['epaisseur'] != '1')
           {
              $dataProd_attrib = ['produits_id'=>$idPrd,
                        'attributs_id'=>$ele['epaisseur'],
                       ];
                 produits_has_attributs::create($dataProd_attrib);

           }
         //Pour les couleur
           if($ele['color'] != '1')
           {
              $dataProd_attrib = ['produits_id'=>$idPrd,
                        'attributs_id'=>$ele['color'],
                       ];
               produits_has_attributs::create($dataProd_attrib);
           }

         //Pour l'image
           if($ele['imgPrdByColor'] != '')
           {
              $dataProd_attrib = ['lien'=>$ele['imgPrdByColor'],
                                 'produits_id'=>$idPrd, 
                                 'attributs_id'=> $ele['color'],];
               img_prd_by_color::create($dataProd_attrib);
           }

       // Enregistrement dans la table stock
          $myStck = ['taille'=>$ele['taille'],
                     'couleur'=>$ele['color'],
                     'pointure'=>$ele['pointure'],
                     'epaisseur'=>$ele['epaisseur'],
                     'qte'=>$ele['qte'],
                     'prixPrd'=>$ele['prix'],
                     'produits_id'=>$idPrd,
                   ];

            stock_prd::create($myStck);

      }

      //Supression de la session
        unset($_SESSION['savePrd']);
        unset($_SESSION['optPrd']);


    return response()->json();
  }

  //Supression d'une option
  public function delOpt(Request $request)
  {
    $nbr = $request->idEle;
    unset($_SESSION['optPrd'][$nbr]);
    return response()->json();
  }

  //


  //Annulation de l'ajout option
  public function delAllOpt()
  {
        unset($_SESSION['savePrd']);
        unset($_SESSION['optPrd']);
    return response()->json();
  }


  //Ajout d'option en session
  public function addOpt(Request $request)
  { 

      $lien = env('LIEN_FILE');
    // Verification si fichier soumis
      if(!empty($request->file('imgPrdByColor')))
          {
              // Récupération du name file  
                 $imgP = $request->file('imgPrdByColor');
                // dossier de stockage
                 $path = $imgP->store('imgPrdByColor','public');
                // Chemin d'accès de l'image 
                 $imageP = $lien.$path;
          }
        else
          {
            $imageP = getTProdId($_SESSION['savePrd'])->first()->img;
          }

            //Ajout en seesion des infos 
              if (isset($_SESSION['optPrd'])) 
                 {
                    $item_array = array(
                     'taille'      => $request->taille,
                     'color'     => $request->color,
                     'epaisseur'     => $request->epaisseur,
                     'pointure'     => $request->pointure,
                     'prix'     => $request->prix,
                     'qte'     => $request->qte,
                     'imgPrdByColor'=> $imageP,
                     );

                    $_SESSION["optPrd"][] = $item_array;
                  }
              else
                {

                  $item_array = array(
                     'taille'      => $request->taille,
                     'color'     => $request->color,
                     'epaisseur'     => $request->epaisseur,
                     'pointure'     => $request->pointure,
                     'prix'     => $request->prix,
                     'qte'     => $request->qte,
                     'imgPrdByColor'=> $imageP,

                   );

                  //Création de session
                   $_SESSION["optPrd"][] = $item_array;
                }


    return response()->json();
  }


  //Suprime un element en session
    public function delSession(Request $request)
    {
      if(isset($_SESSION[$request->session])) 
      {
        if ($request->session == 'savePrd') {
          //ENREGISTREMEN DU PRD DANS LA TABLE STOCK avec valeur par defaut
            
            $prd = Produit::find($_SESSION['savePrd']); //Get the product saved
            $ele = ['taille' =>1, 'couleur' =>1, 
                    'pointure' =>1, 'epaisseur' =>1,
                    'qte' =>$prd->quantite, 'prixPrd' =>$prd->prix, 
                    'produits_id' =>$prd->id];
            stock_prd::create($ele);                    //Save to stock
        }
        unset($_SESSION[$request->session]);
      }

      return response()->json();

    }
  //Liste des produits publie
	  public function pubProd()
  	{
  		$catgL = categorie::all()->sortByDesc('id');
  		$prod = DB::table('produits')
                  ->where('statut', '=', 1)
                  ->orderBy('id','desc')->get();
  		return view('pages.dash.Produit.pubProd')
  			     ->with('prod',$prod)
  		       ->with('catgL',$catgL);
  	}

	public function delProd(Request $request)
	{
		$idProd = $request->idProd;
		Schema::disableForeignKeyConstraints();  
		$prod = produit::find($idProd);
		DB::table('images')->where('produits_id','=',$idProd)
						   ->delete();
		$prod->delete();
	}

	public function bloqueProd(Request $request)
	{
		$idProd = $request->idProd;
		$prod = DB::table('produits')
              ->where('id', $idProd)
              ->update(['statut' => 2]);
	}

	public function bloqueProdunlock(Request $request)
	{
		$idProd = $request->idProd;
		$prod = DB::table('produits')
              ->where('id', $idProd)
              ->update(['statut' => 1]);
	}

	public function updProd(Request $request)
	{
		$idProd   = $request->idProd;
		$nomPrd   = $request->nomPrd;
        $prixProd = $request->prixProd;
        $descProd = $request->descProd;

		$prod = DB::table('produits')
              ->where('id', $idProd)
              ->update(['nom' =>$nomPrd,
              			'prix'=>$prixProd,
              			'description'=>$descProd
              		  ]);
	}

	public function catgProd(Request $request)
	{
		$catg = $request->catg;
		$prod = DB::table('produits')
                ->where('categorie_id', '=', $catg)
                ->where('statut', '=', 1)
                ->get();
        $nb = count($prod);
        $output = '';
		if ($nb==0) {
		 $output.='
		  <div class="alert alert-danger col-lg-12" role="alert">
		   Aucun produit dans cette catégorie
	      </div>';
		}else{
		 foreach ($prod as $prd) {
		 	$output.='<div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                        <a class="d-block" href="#">
                          <img class="img-fluid rounded-top" 
                          src='.$prd->img.' 
                          alt="" /></a>
                        <span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0">
                          <a class="text-dark" href="#">
                          '.$prd->nom.'
                          </a>
                        </h5>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                          '.$prd->prix.'cfa
                        </h5>
                        <p class="fs--1 mb-3"><a class="text-500" 
                          href="#!">'.$prd->description.'</a></p>
                        
                        
                       
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      <div>

                        <a class="btn btn-sm btn-falcon-default mr-2 editProd" href="#!" data-toggle="tooltip"  
                         data-placement="top" 
                         title="Modifier le produit" 
                         nomprod='.$prd->nom.'
                         prixprod='.$prd->prix.'
                         descrprod='.$prd->description.'
                         imgprod='.$prd->img.'
                         id='.$prd->id.'>
                         <span class="far fa-edit"></span>
                        </a>

                       <a class="btn btn-sm btn-falcon-default text-primary eyeProd" href="#!" data-toggle="tooltip" data-placement="top" title="Bloqué le produit" id='.$prd->id.'><span class="far fa-eye-slash"></span>
                       </a>
                       <a class="btn btn-sm btn-falcon-default text-danger delProd" href="#!" data-toggle="tooltip" data-placement="top" title="Supprimer le produit" id='.$prd->id.'><span class="fas fa-trash"></span>
                       </a>

                      </div>

                    </div>
                  </div>
                </div>';
		 }

        }

        $output.='
        <script type="text/javascript">

         // Bloquer le produit
         $(".eyeProd").click(function(){
         	var idProd = $(this).attr("id");
         	Swal.fire({
             title: "Produit publié",
             text: "Voulez-vous bloqué ce produit ?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor:"#d33",
             cancelButtonColor:"#3085d6",
             cancelButtonText:"Annuler",
             confirmButtonText:"oui , bloqué!",
             backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
            	if(result.value)
            	{
            		$.ajax({
            		 url:"bloqueProd",
            		 method:"GET",
            		 data:{idProd:idProd},
            		 dataType:"text",
            		 success:function(){
            		    Swal.fire(
                         "Produit publié!",
                         "bloqué avec succès",
                         "success"
                        );
            		    $("#main_content").load("/pubProd");
            		 },
            		 error:function(){
            		  console.log("Erreur de produit");
            		 }
            		});
            	}
            });
         });

         // Supprimer le produit
         $(".delProd").click(function(){
            var idProd = $(this).attr("id");
            Swal.fire({
              title: "Produit publié",
              text: "Voulez-vous supprimer ce produit ?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              cancelButtonText:"Annuler",
              confirmButtonText:"oui , Supprimer!",
              backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
             if(result.value){
             	$.ajax({
            	 url:"delProd",
            	 method:"GET",
            	 data:{idProd:idProd},
            	 dataType:"text",
            	 success:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Supprimé avec succès",
                     "success"
                    );
                    $("#main_content").load("/pubProd");
            	 },
            	 error:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Erreur de suppression",
                     "error"
                    );
            	 }
            	});
             }
            })
         });

         // Mise à jour du produit
          $(".editProd").click(function(){
          	 var nomprod   = $(this).attr("nomprod");
             var prixprod  = $(this).attr("prixprod");
             var descrprod = $(this).attr("descrprod");
             var imgprod   = $(this).attr("imgprod");
             var id        = $(this).attr("id");
             $("#exampleModalRightLabel").text(nomprod);
             $("#nomMd").val(nomprod);
             $("#prixMd").val(prixprod);
             $("#descrpMd").val(descrprod);
             $("#idprod").val(id);
             $("#exampleModalRight").modal("show");
          });

        </script>';

		return $output;
	}

	public function lockcatgProd(Request $request)
	{
		$catg = $request->catg;
		$prod = DB::table('produits')
                ->where('categorie_id', '=', $catg)
                ->where('statut', '=', 2)
                ->get();
        $nb = count($prod);
        $output = '';
		if ($nb==0) {
		 $output.='
		  <div class="alert alert-danger col-lg-12" role="alert">
		   Aucun produit dans cette catégorie
	      </div>';
		}else{
		 foreach ($prod as $prd) {
		 	$output.='<div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                        <a class="d-block" href="#">
                          <img class="img-fluid rounded-top" 
                          src='.$prd->img.' 
                          alt="" /></a>
                        <span class="badge badge-pill badge-danger position-absolute r-0 t-0 mt-2 mr-2 z-index-2">lock</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0">
                          <a class="text-dark" href="#">
                          '.$prd->nom.'
                          </a>
                        </h5>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                          '.$prd->prix.'cfa
                        </h5>
                        <p class="fs--1 mb-3"><a class="text-500" 
                          href="#!">'.$prd->description.'</a></p>
                        
                        
                       
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      <div>

                        <a class="btn btn-sm btn-falcon-default mr-2 editProd" href="#!" data-toggle="tooltip"  
                         data-placement="top" 
                         title="Modifier le produit" 
                         nomprod='.$prd->nom.'
                         prixprod='.$prd->prix.'
                         descrprod='.$prd->description.'
                         imgprod='.$prd->img.'
                         id='.$prd->id.'>
                         <span class="far fa-edit"></span>
                        </a>

                       <a class="btn btn-sm btn-falcon-default text-primary eyeProd" href="#!" data-toggle="tooltip" data-placement="top" title="Bloqué le produit" id='.$prd->id.'><span class="far fa-eye-slash"></span>
                       </a>
                       <a class="btn btn-sm btn-falcon-default text-danger delProd" href="#!" data-toggle="tooltip" data-placement="top" title="Supprimer le produit" id='.$prd->id.'><span class="fas fa-trash"></span>
                       </a>

                      </div>

                    </div>
                  </div>
                </div>';
		 }

        }

        $output.='
        <script type="text/javascript">

         // Bloquer le produit
         $(".eyeProd").click(function(){
         	var idProd = $(this).attr("id");
         	Swal.fire({
             title: "Produit publié",
             text: "Voulez-vous bloqué ce produit ?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor:"#d33",
             cancelButtonColor:"#3085d6",
             cancelButtonText:"Annuler",
             confirmButtonText:"oui , bloqué!",
             backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
            	if(result.value)
            	{
            		$.ajax({
            		 url:"bloqueProd",
            		 method:"GET",
            		 data:{idProd:idProd},
            		 dataType:"text",
            		 success:function(){
            		    Swal.fire(
                         "Produit publié!",
                         "bloqué avec succès",
                         "success"
                        );
            		    $("#main_content").load("/lockProd");
            		 },
            		 error:function(){
            		  console.log("Erreur de produit");
            		 }
            		});
            	}
            });
         });

         // Supprimer le produit
         $(".delProd").click(function(){
            var idProd = $(this).attr("id");
            Swal.fire({
              title: "Produit publié",
              text: "Voulez-vous supprimer ce produit ?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              cancelButtonText:"Annuler",
              confirmButtonText:"oui , Supprimer!",
              backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
             if(result.value){
             	$.ajax({
            	 url:"delProd",
            	 method:"GET",
            	 data:{idProd:idProd},
            	 dataType:"text",
            	 success:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Supprimé avec succès",
                     "success"
                    );
                    $("#main_content").load("/pubProd");
            	 },
            	 error:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Erreur de suppression",
                     "error"
                    );
            	 }
            	});
             }
            })
         });

         // Mise à jour du produit
          $(".editProd").click(function(){
          	 var nomprod   = $(this).attr("nomprod");
             var prixprod  = $(this).attr("prixprod");
             var descrprod = $(this).attr("descrprod");
             var imgprod   = $(this).attr("imgprod");
             var id        = $(this).attr("id");
             $("#exampleModalRightLabel").text(nomprod);
             $("#nomMd").val(nomprod);
             $("#prixMd").val(prixprod);
             $("#descrpMd").val(descrprod);
             $("#idprod").val(id);
             $("#exampleModalRight").modal("show");
          });

        </script>';

		return $output;
	}

	public function SingleProd(Request $request)
	{
		$nomProd = $request->produit;
		$prod = DB::table('produits')
                ->where('nom', 'LIKE', "%{$nomProd}%")
                ->where('statut', '=', 1)
                ->get();
        $nb = count($prod);
       
        $output = '';
		if ($nb==0) {
		 $output.='
		  <div class="alert alert-danger col-lg-12" role="alert">
		   Aucun produit dans cette catégorie
	      </div>';
		}else{
		 foreach ($prod as $prd) {
		 	$output.='<div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                        <a class="d-block" href="#">
                          <img class="img-fluid rounded-top" 
                          src='.$prd->img.' 
                          alt="" /></a>
                        <span class="badge badge-pill badge-success position-absolute r-0 t-0 mt-2 mr-2 z-index-2">Pub</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0">
                          <a class="text-dark" href="#">
                          '.$prd->nom.'
                          </a>
                        </h5>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                          '.$prd->prix.'cfa
                        </h5>
                        <p class="fs--1 mb-3"><a class="text-500" 
                          href="#!">'.$prd->description.'</a></p>
                        
                        
                       
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      <div>

                        <a class="btn btn-sm btn-falcon-default mr-2 editProd" href="#!" data-toggle="tooltip"  
                         data-placement="top" 
                         title="Modifier le produit" 
                         nomprod='.$prd->nom.'
                         prixprod='.$prd->prix.'
                         descrprod='.$prd->description.'
                         imgprod='.$prd->img.'
                         id='.$prd->id.'>
                         <span class="far fa-edit"></span>
                        </a>

                       <a class="btn btn-sm btn-falcon-default text-primary eyeProd" href="#!" data-toggle="tooltip" data-placement="top" title="Bloqué le produit" id='.$prd->id.'><span class="far fa-eye-slash"></span>
                       </a>
                       <a class="btn btn-sm btn-falcon-default text-danger delProd" href="#!" data-toggle="tooltip" data-placement="top" title="Supprimer le produit" id='.$prd->id.'><span class="fas fa-trash"></span>
                       </a>

                      </div>

                    </div>
                  </div>
                </div>';
		 }

        }

        $output.='
        <script type="text/javascript">

         // Bloquer le produit
         $(".eyeProd").click(function(){
         	var idProd = $(this).attr("id");
         	Swal.fire({
             title: "Produit publié",
             text: "Voulez-vous bloqué ce produit ?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor:"#d33",
             cancelButtonColor:"#3085d6",
             cancelButtonText:"Annuler",
             confirmButtonText:"oui , bloqué!",
             backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
            	if(result.value)
            	{
            		$.ajax({
            		 url:"bloqueProd",
            		 method:"GET",
            		 data:{idProd:idProd},
            		 dataType:"text",
            		 success:function(){
            		    Swal.fire(
                         "Produit publié!",
                         "bloqué avec succès",
                         "success"
                        );
            		    $("#main_content").load("/pubProd");
            		 },
            		 error:function(){
            		  console.log("Erreur de produit");
            		 }
            		});
            	}
            });
         });

         // Supprimer le produit
         $(".delProd").click(function(){
            var idProd = $(this).attr("id");
            Swal.fire({
              title: "Produit publié",
              text: "Voulez-vous supprimer ce produit ?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              cancelButtonText:"Annuler",
              confirmButtonText:"oui , Supprimer!",
              backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
             if(result.value){
             	$.ajax({
            	 url:"delProd",
            	 method:"GET",
            	 data:{idProd:idProd},
            	 dataType:"text",
            	 success:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Supprimé avec succès",
                     "success"
                    );
                    $("#main_content").load("/pubProd");
            	 },
            	 error:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Erreur de suppression",
                     "error"
                    );
            	 }
            	});
             }
            })
         });

         // Mise à jour du produit
          $(".editProd").click(function(){
          	 var nomprod   = $(this).attr("nomprod");
             var prixprod  = $(this).attr("prixprod");
             var descrprod = $(this).attr("descrprod");
             var imgprod   = $(this).attr("imgprod");
             var id        = $(this).attr("id");
             $("#exampleModalRightLabel").text(nomprod);
             $("#nomMd").val(nomprod);
             $("#prixMd").val(prixprod);
             $("#descrpMd").val(descrprod);
             $("#idprod").val(id);
             $("#exampleModalRight").modal("show");
          });

        </script>';

		return $output;
	}

	public function SingleProdlock(Request $request)
	{
		$nomProd = $request->produit;
		$prod = DB::table('produits')
                ->where('nom', 'LIKE', "%{$nomProd}%")
                ->where('statut', '=', 2)
                ->get();
        $nb = count($prod);
       
        $output = '';
		if ($nb==0) {
		 $output.='
		  <div class="alert alert-danger col-lg-12" role="alert">
		   Aucun produit dans cette catégorie
	      </div>';
		}else{
		 foreach ($prod as $prd) {
		 	$output.='<div class="mb-4 col-md-6 col-lg-4">
                  <div class="border rounded h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden">
                        <a class="d-block" href="#">
                          <img class="img-fluid rounded-top" 
                          src='.$prd->img.' 
                          alt="" /></a>
                        <span class="badge badge-pill badge-danger position-absolute r-0 t-0 mt-2 mr-2 z-index-2">lock</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0">
                          <a class="text-dark" href="#">
                          '.$prd->nom.'
                          </a>
                        </h5>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3">
                          '.$prd->prix.'cfa
                        </h5>
                        <p class="fs--1 mb-3"><a class="text-500" 
                          href="#!">'.$prd->description.'</a></p>
                        
                        
                       
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-3">
                      
                      <div>

                        <a class="btn btn-sm btn-falcon-default mr-2 editProd" href="#!" data-toggle="tooltip"  
                         data-placement="top" 
                         title="Modifier le produit" 
                         nomprod='.$prd->nom.'
                         prixprod='.$prd->prix.'
                         descrprod='.$prd->description.'
                         imgprod='.$prd->img.'
                         id='.$prd->id.'>
                         <span class="far fa-edit"></span>
                        </a>

                       <a class="btn btn-sm btn-falcon-default text-primary eyeProd" href="#!" data-toggle="tooltip" data-placement="top" title="Bloqué le produit" id='.$prd->id.'><span class="far fa-eye"></span>
                       </a>
                       <a class="btn btn-sm btn-falcon-default text-danger delProd" href="#!" data-toggle="tooltip" data-placement="top" title="Supprimer le produit" id='.$prd->id.'><span class="fas fa-trash"></span>
                       </a>

                      </div>

                    </div>
                  </div>
                </div>';
		 }

        }

        $output.='
        <script type="text/javascript">

         // débloquer le produit
         $(".eyeProd").click(function(){
         	var idProd = $(this).attr("id");
         	Swal.fire({
             title: "Produit publié",
             text: "Voulez-vous débloqué ce produit ?",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor:"#d33",
             cancelButtonColor:"#3085d6",
             cancelButtonText:"Annuler",
             confirmButtonText:"oui , débloqué!",
             backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
            	if(result.value)
            	{
            		$.ajax({
            		 url:"bloqueProdunlock",
            		 method:"GET",
            		 data:{idProd:idProd},
            		 dataType:"text",
            		 success:function(){
            		    Swal.fire(
                         "Produit publié!",
                         "débloqué avec succès",
                         "success"
                        );
            		    $("#main_content").load("/lockProd");
            		 },
            		 error:function(){
            		  console.log("Erreur de produit");
            		 }
            		});
            	}
            });
         });

         // Supprimer le produit
         $(".delProd").click(function(){
            var idProd = $(this).attr("id");
            Swal.fire({
              title: "Produit publié",
              text: "Voulez-vous supprimer ce produit ?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#3085d6",
              cancelButtonText:"Annuler",
              confirmButtonText:"oui , Supprimer!",
              backdrop: `rgba(240,15,83,0.4)`
            }).then((result)=>{
             if(result.value){
             	$.ajax({
            	 url:"delProd",
            	 method:"GET",
            	 data:{idProd:idProd},
            	 dataType:"text",
            	 success:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Supprimé avec succès",
                     "success"
                    );
                    $("#main_content").load("/lockProd");
            	 },
            	 error:function(){
            	 	Swal.fire(
                     "Supression!",
                     "Erreur de suppression",
                     "error"
                    );
            	 }
            	});
             }
            })
         });

         // Mise à jour du produit
          $(".editProd").click(function(){
          	 var nomprod   = $(this).attr("nomprod");
             var prixprod  = $(this).attr("prixprod");
             var descrprod = $(this).attr("descrprod");
             var imgprod   = $(this).attr("imgprod");
             var id        = $(this).attr("id");
             $("#exampleModalRightLabel").text(nomprod);
             $("#nomMd").val(nomprod);
             $("#prixMd").val(prixprod);
             $("#descrpMd").val(descrprod);
             $("#idprod").val(id);
             $("#exampleModalRight").modal("show");
          });

        </script>';

		return $output;
	}

	public function lockProd()
	{
	    $catgL = categorie::all()->sortByDesc('id');
		$prod = DB::table('produits')
                ->where('statut', '=', 2)
                ->get();
		return view('pages.dash.Produit.lockProd')
			   ->with('prod',$prod)
		       ->with('catgL',$catgL);
	}

// Gestion de client
	public function nwClient()
	{
		echo "Nouveau client";
	}

	public function listClient()
	{
		$client = client::all()->sortByDesc('id');
		return view('pages.dash.Client.listClient')
			->with('clients',$client);
	}

	public function delClient(Request $request)
	{
		$idclient = $request->idclient;  
		$client = client::find($idclient);
		$client->delete();
	}

	public function updClient(Request $request)
	{
		$idClient = $request->idclient;
		$domcile  = $request->domcile;
        $ville    = $request->villeM;
        $tel      = $request->tel;
		$pass     = $request->pass;
		$client   = DB::table('clients')
              ->where('id', $idClient)
              ->update([
              			'domicile'=>$domcile,
              			'ville'=>$ville,
              			'numero_telephone'=>$tel,
              			'pass'=>$pass,
              		  ]);
	}

// Gestion de commandes
	public function newComd()
	{
        $comd = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.id')
            ->select('clients.*','clients.id as clientsID','commandes.*','commandes.id as comdID')
            ->where("commandes.Statut",'=',0)
            ->orderBy('commandes.id','desc')
            ->get();
      
		return view('pages.dash.Commande.newComd')
			->with('comd',$comd);
	}

	public function comdListe(Request $request)
	{
		$idclient = $request->idclient;
		$numCmd   = $request->numcd;
		$prodL = DB::table('produits_has_clients')
            ->join('produits', 'produits_has_clients.produits_id',
                   '=', 'produits.id')
            ->select('produits.*','produits.id as produitsID',
            	'produits_has_clients.*')
            ->where("produits_has_clients.client_id",'=',$idclient)
            ->where("produits_has_clients.numComd",'=',$numCmd)
            ->get();
       /* dd($prodL);*/
        $output = '';
        foreach ($prodL as $prd) {
         $output.='
         	<div class="notification-avatar">
                  <div class="avatar avatar-xl mr-3">
                    <img class="rounded-circle" 
                     src='.$prd->img.'
                     alt="" />
                  </div>
                </div>
                <div class="notification-body">
                  <p class="mb-1">
                    Nom: <strong>'.$prd->nom.'</strong><br>
                    Prix: <strong>'.$prd->prix." ".getTDevise().'</strong><br>
                    Qte: <strong>'.$prd->qte.'</strong><br>
                  </p>
            </div>
         ';
        }
        return $output;
	}

	public function delComd(Request $request)
	{
		$idComd = $request->id;
		$numcmd = $request->numcmd;
		$cmd = commande::find($idComd);
		DB::table('produits_has_clients')
		    ->where('numComd', '=', $numcmd)->delete();
		$cmd->delete();
	}

	public function refusComd(Request $request)
	{
		$id       = $request->id;
		$numcmd   = $request->numcmd;

		$prod = DB::table('commandes')
              ->where('id', $id)
              ->update(['Statut' =>2]);
	}

	public function shipComd(Request $request)
	{
		$id       = $request->id;
		$numcmd   = $request->numcmd;

		$prod = DB::table('commandes')
              ->where('id', $id)
              ->update(['Statut' =>1]);
	}

	public function noComd()
	{
		$comd = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.id')
            ->select('clients.*','clients.id as clientsID','commandes.*','commandes.id as comdID')
            ->where("commandes.Statut",'=',2)
            ->orderBy('commandes.id','desc')
            ->get();
      
		return view('pages.dash.Commande.noComd')
			->with('comd',$comd);
	}



	public function livComd()
	{
		$comd = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.id')
            ->select('clients.*','clients.id as clientsID','commandes.*','commandes.id as comdID')
            ->where("commandes.Statut",'=',1)
            ->orderBy('commandes.id','desc')
            ->get();
      
		return view('pages.dash.Commande.livComd')
			->with('comd',$comd);
	}

// Gestion de zone de livraison
	public function newZone()
	{
		return view('pages.dash.Zone.newZone');
	}

	public function listeZone()
	{
		// Lecture des zones
		 $zone = DB::table('livraisons')
            ->join('pays', 'livraisons.ville_pays_id', '=', 'pays.id')
            ->join('villes', 'livraisons.ville_id', '=', 'villes.id')
            ->select('pays.*','pays.id as paysID','villes.*',
            	     'livraisons.*','livraisons.id as livID',
            	     'villes.id as villeID')
            ->orderBy('livraisons.id','desc')
            ->get();
         
		 return view('pages.dash.Zone.listeZone')
		 		->with('zones',$zone);
	}

	public function delZn(Request $request)
	{
		$idZn = $request->idZn;
		Schema::disableForeignKeyConstraints();  
		$zone = livraison::find($idZn);
		$zone->delete();
	}

	public function AddZone(Request $request)
	{
		$pays  = $request->pays;
		$ville = $request->ville;
    $cout  = $request->cout;
		$delais  = $request->delais;


		$paysV = pays::where('pays','=',$pays)->get()
		         ->first();
		if ($paysV==null) {
		 $paysL = pays::create(['pays'=>$pays]);
		 $paysID = $paysL->id;
		}else{
		 $paysID = $paysV->id;
		}

		$villeV = ville::where('ville','=',$ville)->get()
		         ->first();
		if ($villeV==null) {
		 $villeL = ville::create(['ville'=>$ville,'pays_id'=>$paysID]);
		 $villeID = $villeL->id;
		}else{
		 $villeID = $villeV->id;
		}

		$livr = Livraison::create(
			     ['livraison'=>$cout,
				  'ville_id'=>$villeID,
          'ville_pays_id'=>$paysID,
				  'delais_liv'=>$delais
				]);
		
	}

// Gestion de catégorie
	public function newCatg()
	{
		return view('pages.dash.categorie.catgNew');
	}

  public function newSCatg()
  {
    return view('pages.dash.categorie.scatgNew');
  }



	public function listeCatg()
	{
		$catgL = categorie::all()->sortByDesc('id');
		return view('pages.dash.categorie.CatgList')
		       ->with('catgL',$catgL);

	}

  public function listeSCatg()
  {
    $catgL = souscategorie::all()->sortByDesc('id');
    return view('pages.dash.categorie.listeSCatg')
           ->with('catgL',$catgL);

  }

	public function AddCatg(Request $request)
	{
		$catg = $request->catg;
		$catgV = categorie::where('categorie','=',$catg)->get()
		         ->first();
		if ($catgV==null) {
		 $catgID = categorie::create(['categorie'=>$catg]);
		}
	}

  public function AddSCatg(Request $request)
  {
    $catg = $request->catg;
    $catgV = souscategorie::where('libele','=',$catg)
                           ->get()
                           ->first();

    if ($catgV==null) {
     $catgID = souscategorie::create(['libele'=>$catg]);
     dd($catgID);
    }
  }

	public function delCatg(Request $request)
	{
		$idCatg = $request->idCatg;
		Schema::disableForeignKeyConstraints();  
		$catg = categorie::find($idCatg);
		$catg->delete();
	}

  public function delSCatg(Request $request)
  {
    $idCatg = $request->idCatg;
    Schema::disableForeignKeyConstraints();  
    $catg = souscategorie::find($idCatg);
    $catg->delete();
  }

  public function CatgSCatg(Request $request)
  {

    $catgL  = categorie::all()->sortByDesc('id');
    $scatgL = souscategorie::all()->sortByDesc('id');

    $scatgcatg = DB::table('catg_has_scatgs')
                ->join('categories', 'catg_has_scatgs.Idcatg','=', 
                     'categories.id')
                ->join('souscategories','catg_has_scatgs.Idscatg','=', 
                     'souscategories.id')
                ->select('souscategories.*','souscategories.id as SctgID',
                       'categories.*','categories.id as catgID')
                ->get();

    return view('pages.dash.categorie.affectation')
           ->with('catgL',$catgL)
           ->with('scatgL',$scatgL)
           ->with('catgscatg',$scatgcatg);
  }

  public function addcatgScatg(Request $request)
  {
    $catg  = $request->catg;
    $scatg = $request->scatg;
    $data = ['Idcatg'=>$catg,'Idscatg'=>$scatg];
    $catg = catg_has_scatg::create($data);
    dd($catg);
  }

// Gestion de slide
	public function newSlide()
	{
		return view('pages.dash.Slide.newSlide');
	}

	public function AddSlide(Request $request)
	{
            $lien = $this->folderLink;
            // Récupération des images
             Schema::disableForeignKeyConstraints(); 
             if(!empty($request->file('slide1')))
             {
             	// Récupération du name file  
          	     $imgP = $request->file('slide1');
          	    // dossier de stockage
          	     $path = $imgP->store('slide','public');
          	    // Chemin d'accès de l'image 
          	     $imageP = $lien.$path;
          	    // Infos images
                 $slide = DB::table('slides')
                         ->where('id',16)
                         ->update(['fichier'=>$imageP]);
             }
             if(!empty($request->file('slide2')))
             {
             	// Récupération du name file  
          	     $imgP = $request->file('slide2');
          	    // dossier de stockage
          	     $path = $imgP->store('slide','public');
          	    // Chemin d'accès de l'image 
          	     $imageP = $lien.$path;
          	    // Infos images
                 $slide = DB::table('slides')
                         ->where('id', 16)
                         ->update(['fichier2'=>$imageP]);
             }
             if(!empty($request->file('slide3')))
             {
             	// Récupération du name file  
          	     $imgP = $request->file('slide3');
          	    // dossier de stockage
          	     $path = $imgP->store('slide','public');
          	    // Chemin d'accès de l'image 
          	     $imageP = $lien.$path;
          	    // Infos images
                $slide = DB::table('slides')
                         ->where('id',16)
                         ->update(['fichier3'=>$imageP]);
             }
            return redirect('/dashboard');


	}

	public function pubSlide()
	{
		$slide = slide::all()->sortByDesc('id');
		return view('pages.dash.Slide.PubSlide')
					->with('slide',$slide);
	}

	public function delSlide(Request $request)
	{
		$idslide = $request->idSlide;
		DB::table('slides')
		    ->where('id', '=', $idslide)
		    ->delete();

	}


// Gestion de paramètres
	public function setting()
	{
		$setting = setting::all()->sortByDesc('id');
		return view('pages.dash.parametres.params')
		       ->with('setting',$setting);
	}

	public function UpdParam(Request $request)
	{
        $lien = $this->folderLink;
         
        // Récupération images
          if(!empty($request->file('logo')))
          {
          	// Récupération du name file  
          	 $imgP = $request->file('logo');

          	// dossier de stockage
          	 $path = $imgP->store('imgLogo','public');

          	// Chemin d'accès de l'image 
          	 $imageP = $lien.$path;

          	// Modifier
          	 $about    = $request->about;
             $year     = $request->year;
             $heur     = $request->heur;
             $pass     = $request->pass;
		     $devise   = $request->devise;
             $mail     = $request->mail;
             $tel      = $request->tel;
		     $lieu     = $request->lieu;
		     $site     = $request->site;
		     $pass     = $request->pass;
		     $plays    = $request->plays;
             $faceb    = $request->faceb;
		     $setting  = DB::table('settings')
              ->where('id', 1)
              ->update([
              			'devises'=>$devise,
              			'mail'=>$mail,
              			'site'=>$site,
              			'tel' =>$tel,
              			'lieu'=>$lieu,
              			'heur'=>$heur,
              			'pass'=>$pass,
              			'year'=>$year,
              			'about'=>$about,
              			'logo'=>$imageP,
              			'plays'=>$plays,
						        'faceb'=>$faceb
              		  ]);
       		
          }
          else{
          	$about    = $request->about;
            $year     = $request->year;
            $heur     = $request->heur;
            $pass     = $request->pass;
		    $devise   = $request->devise;
            $mail     = $request->mail;
            $tel      = $request->tel;
		    $lieu     = $request->lieu;
		    $site     = $request->site;
		    $pass     = $request->pass;
		    $plays    = $request->plays;
            $faceb    = $request->faceb;
		    $setting  = DB::table('settings')
              ->where('id', 1)
              ->update([
              			'devises'=>$devise,
              			'mail'=>$mail,
              			'site'=>$site,
              			'tel' =>$tel,
              			'lieu'=>$lieu,
              			'heur'=>$heur,
              			'pass'=>$pass,
              			'year'=>$year,
              			'about'=>$about,
              			'plays'=>$plays,
						'faceb'=>$faceb
              		  ]);
          }
        
        return redirect('/dashboard');

	}

	public function facebook(Request $request)
	{
		return view('facebook');
	}

  public function playst(Request $request)
  {
    return view('playst');
  }


  




}

?>