<?php

use App\Model\Setting;
session_start();

if(!function_exists('getTProd'))
{
	function getTProd()
	{
		$prod = DB::table('produits')
                ->where('statut', '=', 1)
                ->get();
      	$nb = count($prod);
		return $nb;
	}
}


//Donne la valeur $default a une variable  si elle est  vide
if(!function_exists('setDefault'))
{
	function setDefault($variable,$default)
	{
		
		if(empty($variable))
		{
			return $default;
		}
		else
		{
			return $variable;
		}
	}
}

if(!function_exists('getNbProd'))
{
	function getNbProd()
	{
		if (isset($_SESSION["panier"])) {

		 $nbCart = count($_SESSION["panier"]);
		}
		else{
			$nbCart = 0;
		}	
		return $nbCart;
	}
}

//Format Prix
	if(!function_exists('formatPrice'))
	{
		function formatPrice($prix)
		{
			$prix = number_format( $prix,0,',','.');
			return $prix;
		}
	}	


//Le montant que vaut le contenue du panier
if(!function_exists('getPrixPanier'))
{
	function getPrixPanier()
	{
		$total = 0;
		if (isset($_SESSION["panier"])) 
		{
		     foreach($_SESSION['panier'] as $keys => $values)
		     {
		     	$total +=($values['qte']*$values['prix']);
		     }
		} 	

		return $total;
	}
}


if(!function_exists('EmpyCart'))
{
	function EmpyCart()
	{
		if (!empty($_SESSION["panier"])) {
		 unset($_SESSION["panier"]);
		 unset($_SESSION["cmd"]);
		}

	}
}

if(!function_exists('EmptyClienC'))
{
	function EmptyClienC()
	{
		if (!empty($_SESSION["clients"])) {
		 unset($_SESSION["clients"]);
		}

	}
}


if(!function_exists('EmptyClient'))
{
	function EmptyClient()
	{
		if (!empty($_SESSION["clients"])) {
		 unset($_SESSION["clients"]);
		}

	}
}


if(!function_exists('getTProdId'))
{
	function getTProdId($id)
	{
		$prodId = DB::table('produits')
                ->where('id', '=', $id)
                ->get();
      	
		return $prodId;
	}
}

if(!function_exists('getPudProdCatg'))
{
	function getPudProdCatg($categorie)
	{
        $prod = DB::table('produits')
            ->join('categories', 'produits.categorie_id',
            	'=', 'categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where("produits.statut",'=',1)
            ->where("categories.categorie",'=',$categorie)
            ->orderBy('produits.id','desc')
            ->get();
      	
		return $prod;
	}
}

if(!function_exists('getPudProd'))
{
	function getPudProd()
	{


        $prod = DB::table('produits')
            ->join('categories', 'produits.categorie_id',
            	'=', 'categories.id')
            ->select('categories.*','categories.id as categoriesID','produits.*','produits.id as produitsID')
            ->where("produits.statut",'=',1)
            ->orderBy('produits.id','desc')
            ->get();
      	
		return $prod;
	}
}

if(!function_exists('getSlide'))
{
	function getSlide()
	{
		$slide = DB::table('slides')
                ->get();
		return $slide;
	}
}


if(!function_exists('getClients'))
{
	function getClients()
	{
		$client = DB::table('clients')
                ->get();
      	$nbClient = count($client);
		return $nbClient;
	}
}

if(!function_exists('getZone'))
{
	function getZone()
	{
		$zone = DB::table('livraisons')
                ->get();
      	$nbzone = count($zone);
		return $nbzone;
	}
}

if(!function_exists('getCatg'))
{
	function getCatg()
	{
		$catg = DB::table('categories')
                ->get();
      	$nbCatg = count($catg);
		return $nbCatg;
	}
}



if(!function_exists('getThisCatg'))
{
	function getThisCatg($idCat)
	{
		$catg = DB::table('categories')->where('id','=',$idCat)->get();
		return $catg->first();
	}
}
if(!function_exists('getCatgAl()'))
{
	function getCatgAl()
	{
		$catg = DB::table('categories')
                ->get();
      	$nbCatg = count($catg);
		return $catg;
	}
}

// Sélection des sous-catégories en fonction de la catégorie
if(!function_exists('getSCatgAl()'))
{
	function getSCatgAl($catg)
	{
		$scatg = DB::table('catg_has_scatgs')
                ->join('categories', 'catg_has_scatgs.Idcatg','=', 
                	   'categories.id')
                ->join('souscategories','catg_has_scatgs.Idscatg','=', 
                	   'souscategories.id')
                ->select('souscategories.*','souscategories.id as SctgID',
                	     'categories.*','categories.id as catgID')
                ->where('categories.id','=',$catg)
                ->get();
		return $scatg;
	}
}

//Sélection des produits en fonction d'une sous-catégorie lié à une catégorie
if(!function_exists('getProdSctg'))
{
	function getProdSctg($catg,$scatg)
	{
		$ProdSctg = DB::table('produits')
                ->select('produits.*')
                ->where("produits.categorie_id",'=',$catg)
                ->where("produits.idsctg",'=',$scatg)
                ->where("produits.statut",'=',1)
                ->get();
		return $ProdSctg;
	}
}




if(!function_exists('getTComdNew'))
{
	function getTComdNew()
	{
		$comd = DB::table('commandes')
            ->join('clients', 'commandes.client_id', '=', 'clients.id')
            ->select('clients.*','clients.id as clientsID','commandes.*','commandes.id as comdID')
            ->where("commandes.Statut",'=',0)
            ->orderBy('commandes.id','desc')
            ->get();
      	$nb = count($comd);
		return $nb;
	}
}


if(!function_exists('getTDevise'))
{
	function getTDevise()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->devises;
	}
}



if(!function_exists('getTAbout'))
{
	function getTAbout()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->about;
	}
}

if(!function_exists('getTLogo'))
{
	function getTLogo()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->logo;
	}
}



if(!function_exists('getTMail'))
{
	function getTMail()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->mail;
	}
}


if(!function_exists('getLieu'))
{
	function getLieu()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->lieu;
	}
}

if(!function_exists('getHeur'))
{
	function getHeur()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->heur;
	}
}

if(!function_exists('getTel'))
{
	function getTel()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->tel;
	}
}

if(!function_exists('getPass'))
{
	function getPass()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->pass;
	}
}

if(!function_exists('getYear'))
{
	function getYear()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->year;
	}
}

if(!function_exists('getAbout'))
{
	function getAbout()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->about;
	}
}

if(!function_exists('getSite'))
{
	function getSite()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->site;
	}
}

if(!function_exists('getPlays'))
{
	function getPlays()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->plays;
	}
}

if(!function_exists('getFaceb'))
{
	function getFaceb()
	{
		$settg = DB::table('settings')
		          ->select('settings.*')
		          ->first();
		return $settg->faceb;
	}
}


//Recuperation des nouvelle cmd
if(!function_exists('getComnd'))
{
	function getComnd()
	{
         $comd = DB::table('commandes')
                    ->where('client_id', '=', 
                      $_SESSION["clients"]["idClint"])
                    ->get();
          return $comd;
}
}

?>