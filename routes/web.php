<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//PAGE D'acceui du site ecommerce
    Route::get('/index', 'ClientController@index')->name('index');

//Listing des produits par defaut
    Route::get('/', 'ClientController@products')->name('products');

// show a particular product
    Route::get('/showProduct','ClientController@showProduct')->name('showProduct');


// show a particular product
    Route::get('/article/{slug}','ClientController@article')->name('article');




// Auth::routes();
    Auth::routes(['register'=>false]);

//Dash show
    Route::get('/home', 'HomeController@index')->name('home');















/*
|--------------------------------------------------------------------------
| Web Routes :: Back-End
|--------------------------------------------------------------------------
| Interface Administrateur
| 
*/

// Page administrateur
 Route::get('dashboard','AdminController@dashboard')->name('dashboard');



// Gestion de produit
 Route::get('newProd','AdminController@newProd')
      ->name('newProd');
 Route::get('pubProd','AdminController@pubProd')
      ->name('pubProd');
 Route::get('lockProd','AdminController@lockProd')
      ->name('lockProd');
 Route::post('AddProd','AdminController@AddProd')
     ->name('AddProd');
 Route::get('delProd','AdminController@delProd')
    ->name('delProd');
 Route::get('bloqueProd','AdminController@bloqueProd')
    ->name('bloqueProd');
 Route::get('updProd','AdminController@updProd')
    ->name('updProd');
 Route::get('catgProd','AdminController@catgProd')
    ->name('catgProd');
 Route::get('SingleProd','AdminController@SingleProd')
    ->name('SingleProd');
 Route::get('lockcatgProd','AdminController@lockcatgProd')
 	  ->name('lockcatgProd');
 Route::get('SingleProdlock','AdminController@SingleProdlock')
      ->name('SingleProdlock');
 Route::get('bloqueProdunlock','AdminController@bloqueProdunlock')
      ->name('bloqueProdunlock');

 Route::get('searchPrd','ClientController@searchPrd')
      ->name('searchPrd');

 Route::get('prodCatg','ClientController@prodCatg')
      ->name('prodCatg');
      
  Route::get('prodCatgF','ClientController@prodCatgF')
      ->name('prodCatgF');

  Route::get('prodSctg','ClientController@prodSctg')
      ->name('prodSctg');

 //Ajout d'option a un prouit
  Route::get('optPrd', 'AdminController@optPrd')->name('optPrd');
  Route::post('addOpt', 'AdminController@addOpt')->name('addOpt');

//Filtre d'option 
  Route::get('geToption','AdminController@geToption')->name('geToption');

  //Supression option
  Route::get('delOpt', 'AdminController@delOpt')->name('delOpt'); 
  Route::get('delAllOpt', 'AdminController@delAllOpt')->name('delAllOpt'); 
  Route::get('delSession','AdminController@delSession')->name('delSession');

  //Choix d'image par couleur
  Route::get('choixColor', 'AdminController@choixColor')->name('choixColor'); 

  

  //Enregistrement 
  Route::get('saveOpt', 'AdminController@saveOpt')->name('saveOpt');

  


  
 
// Gestion de clients
 Route::get('nwClient','AdminController@nwClient')->name('nwClient');
 Route::get('listClient','AdminController@listClient')
      ->name('listClient');
 Route::get('delClient','AdminController@delClient')->name('delClient');
 Route::get('updClient','AdminController@updClient')->name('updClient');

 
 
// Gestion de commandes
 Route::get('newComd','AdminController@newComd')->name('newComd');
 Route::get('noComd','AdminController@noComd')->name('noComd');
 Route::get('okComd','AdminController@okComd')->name('okComd');
 Route::get('livComd','AdminController@livComd')->name('livComd');
 Route::get('comdListe','AdminController@comdListe')
      ->name('comdListe');
 Route::get('delComd','AdminController@delComd')->name('delComd');
 Route::get('refusComd','AdminController@refusComd')
      ->name('refusComd');
 Route::get('shipComd','AdminController@shipComd')
      ->name('shipComd');

// Gestion de zone
 Route::get('newZone','AdminController@newZone')->name('newZone');
 Route::get('listeZone','AdminController@listeZone')
      ->name('listeZone');
 Route::get('AddZone','AdminController@AddZone')->name('AddZone');
 Route::get('delZn','AdminController@delZn')->name('delZn');
 

// Gestion de catégorie
 Route::get('newCatg','AdminController@newCatg')->name('newCatg');
 Route::get('listeCatg','AdminController@listeCatg')
      ->name('listeCatg');
 Route::get('listeSCatg','AdminController@listeSCatg')
      ->name('listeSCatg');
 Route::get('AddCatg','AdminController@AddCatg')->name('AddCatg');
 Route::get('delCatg','AdminController@delCatg')->name('delCatg');
 Route::get('delSCatg','AdminController@delSCatg')->name('delSCatg');
 Route::get('newSCatg','AdminController@newSCatg')->name('newSCatg');
 Route::get('AddSCatg','AdminController@AddSCatg')->name('AddSCatg');
 Route::get('CatgSCatg','AdminController@CatgSCatg')->name('CatgSCatg');
 Route::get('addcatgScatg','AdminController@addcatgScatg')->name('addcatgScatg');
 
 


// Gestion de slide
 Route::get('newSlide','AdminController@newSlide')
      ->name('newSlide');
 Route::get('pubSlide','AdminController@pubSlide')
      ->name('pubSlide');
 Route::post('AddSlide','AdminController@AddSlide')
      ->name('AddSlide');
 Route::get('delSlide','AdminController@delSlide')
      ->name('delSlide');
  

// Paramétrage
 Route::get('setting','AdminController@setting')
     ->name('setting');
 Route::post('UpdParam','AdminController@UpdParam')
     ->name('UpdParam');
 Route::get('facebook','AdminController@facebook')
     ->name('facebook');

 Route::get('facebook','AdminController@facebook')
     ->name('facebook');

 Route::get('playst','AdminController@playst')
     ->name('playst');
     
// Gestion de panier client
  Route::get('AddCart','ClientController@AddCart')
     ->name('AddCart');

  Route::get('buyComd','ClientController@buyComd')
     ->name('buyComd');
  

// Gestion du compte client
 Route::get('signup','compteController@signup')
     ->name('signup');
 
 Route::get('compteLg','compteController@compteLg')
     ->name('compteLg');
 
 Route::get('loginCpte','compteController@loginCpte')
     ->name('loginCpte');
 
 Route::get('logoutCli','compteController@logoutCli')
     ->name('logoutCli');
 
 Route::get('newwComd','compteController@newwComd')
     ->name('newwComd');
 
 Route::get('livvComd','compteController@livvComd')
     ->name('livvComd');
 
 Route::get('detailComd','compteController@detailComd')
     ->name('detailComd');
  
 
 Route::get('infos','compteController@infos')
     ->name('infos');
 
 Route::get('updClint','compteController@updClint')
     ->name('updClint');
 
 Route::get('sendMail','compteController@sendMail')
     ->name('sendMail');

 
// Paiement cinetpay
  Route::get('cinetpay_notify','ClientController@cinetpay_notify')
     ->name('cinetpay_notify');


//enregistrement transaction
  Route::get('saveTrans', 'ClientController@saveTrans' );
 

 


//TEST DE LIEN 
Route::get('viewPrd', 'ClientController@viewPrd' );

 
 
 
 




 

 









 



 
 
 