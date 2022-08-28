<?php

namespace App\Http\Controllers;
use  App\Model\Produit;
use  App\Model\Categorie;



use Illuminate\Http\Request;



class ClientController extends Controller
{

	public function index()
	{

		return view('pages.client.index');
	}


	//test html link
	public function test()
	{
		return view('pages.client.index');
	}


	//Return all product 
	public function products(Request $request)
	{

		//Set default value for result sorting
		$searchTerm = isset($request->search) ? $request->search : "";
		$categoTrie = isset($request->categorie) ? $request->categorie : 0;
		$perPage = isset($request->perPage) ? $request->perPage : 16;

		//Without sort parameters
		$products  = Produit::orderBy('id', 'desc')->where('nom','like','%'.$searchTerm.'%')
													->paginate($perPage);


		//Lancez  une recherche par le bouton Filtre les resultats 
		if($categoTrie)
		{
			$products  = Produit::orderBy('id', 'desc')->where('categorie_id',$categoTrie)
														->where('nom','like','%'.$searchTerm.'%')
														->paginate($perPage);
		}
		

		return view('pages.client.products')->with('products',$products)
											->with('categos',Categorie::all());

	}


	//Show a product
	public function showProduct(Request $request)
	{
		// dd($request->all());
		$prd = Produit::findOrFail($request)->first();
		// dd($prd->nom);
		$sameCatego = Produit::where('categorie_id',$prd->categorie_id)->orderBy('id', 'desc')->paginate(5);
		
		return view('pages.client.detailProduct')->with('product',$prd)
											->with('sameCatego',$sameCatego);

	}

	//Shpw particular product with slug
	public function article(Request $request)
	{

		
		$prd = Produit::where('slug',$request->slug)->first();
		// dd($prd->id);
		// dd(getImg($prd->id));
		
		$sameCatego = Produit::where('categorie_id',$prd->categorie_id)->orderBy('id', 'desc')->paginate(5);
		
		return view('pages.client.detailProduct')->with('product',$prd)
											->with('sameCatego',$sameCatego);

	}



 

}

?>