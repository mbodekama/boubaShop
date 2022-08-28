<?php

namespace App\Http\Controllers;
use Validator;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Model\Client;

use App\Mail\SendMailcLT;

class compteController extends Controller
{

	// Inscription du client
	public function signup(Request $request)
	 {
	   // Infos images
         $infos=['nom'=>$request->nom,
       	     'prenom'=>$request->prenom,
       	     'numero_telephone'=>$request->number,
       	     'mail'=>$request->email,
       	     'pass'=>$request->password
       	   ];

       	
       	// Session client ouvert
       	 if (!empty($_SESSION['clients'])) 
       	 {
       	 	return redirect("/compteLg");
       	 }
       	 else
       	 {

           $loadPanier = isset($request->achat) ? $request->achat:0;
       	 	 $idclient = Client::create($infos);
       	 	 $client = array(
       	 	      'idClint'=>$idclient->id,
      	        'nom'=>$request->nom,
      	        'prenom'=>$request->prenom,
      	        'numero_telephone'=>$request->number,
      	        'mail'=>$request->email,
      	        'pass'=>$request->password);
       	        $_SESSION["clients"] = $client;
             return redirect("/compteLg?achat=".$loadPanier);
       	 }

	 }

      // Recherche de 

	// Chargement du compte
	 public function compteLg(Request $request)
	 {
    //Cette variable permet de rediriger le client sur son panier
    //lorquil fait une connexion ou inscription pendant son achat
    // $loadPanier = 1 ==> load panier en js dans la vue clientCount
    // $loadPanier = 0 ==> aucune action dans vue clientCount
    $loadPanier = isset($request->achat) ? $request->achat:0;
	 	return view('clientCount')->with('achatEnCour',$loadPanier);
	 }

      // Connection au compte client
       public function loginCpte(Request $request)
       {
        $loadPanier = isset($request->achat) ? $request->achat:0;
        // dd($loadPanier);
         $email = $request->email;
         $pass  = $request->password;
         $users = DB::table('clients')
                    ->where('mail', '=', $email)
                    ->where('pass', '=', $pass)
                    ->get();
         $nb = count($users);
         if ($nb!=0) {

             $clint = DB::table('clients')
                    ->where('mail', '=', $email)
                    ->where('pass', '=', $pass)
                    ->first();

             $client = array(
                    'idClint'=>$clint->id,
                    'nom'=>$clint->nom,
                    'prenom'=>$clint->prenom,
                    'numero_telephone'=>
                      $clint->numero_telephone,
                    'mail'=>$clint->mail,
                    'pass'=>$clint->pass);

             $_SESSION["clients"] = $client;
             return redirect("/compteLg?achat=".$loadPanier);
         }
         else{
            return redirect("/");
         }
       }


      // Déconnection du compte client
       public function logoutCli()
       {
         EmptyClienC();
         return redirect("/");
       }

      // Compte client::Nouvelle commande
       public function newwComd()
       {
         $comd = DB::table('commandes')
                    ->where('client_id', '=', 
                      $_SESSION["clients"]["idClint"])
                    ->get();
                
         return view('pages.client.newComd')
                ->with('comd',$comd);
       }

      // Compte client::Commande livrées
       public function livvComd()
       {
          $comd = DB::table('commandes')
                    ->where('client_id', '=', 
                      $_SESSION["clients"]["idClint"])
                    ->get();
          return view('pages.client.livComd')
                 ->with('comd',$comd);
       }

      // Compte client::Infos
       public function infos()
       {  

         $clint = DB::table('clients')
                    ->where('mail', '=', 
                      $_SESSION["clients"]["mail"])
                    ->where('pass', '=',
                      $_SESSION["clients"]["pass"])
                    ->first();

         return view('pages.client.infos')
                ->with('user',$clint);
       }

      // Mise à jour du compte
       public function updClint(Request $request)
       {
         $nom = $request->nom;
         $prenom = $request->prenom;
         $tel  = $request->tel;
         $email = $request->email;
         $pass  = $request->pass;
         $domicile = $request->domicile;
         $ville  = $request->ville;
         $pays = $request->pays;
         $idclient = $_SESSION['clients']['idClint'];
         $prod = DB::table('clients')
              ->where('id', $idclient)
              ->update([
                'nom' => $nom,
                'prenom' => $prenom,
                'domicile' =>$domicile,
                'ville' => $ville,
                'pays' => $pays,
                'numero_telephone' => $idclient,
                'mail' =>$email,
                'pass' =>$pass
               ]);
       }

      // Détails de la commande
       public function detailComd(Request $request)
       {
          $idclient = $_SESSION["clients"]['idClint'];
          $numCmd   = $request->numCmd;
          $prodL = DB::table('produits_has_clients')
                    ->join('produits', 'produits_has_clients.produits_id',
                      '=', 'produits.id')
                    ->select('produits.*','produits.id as produitsID','produits_has_clients.*')
                    ->where("produits_has_clients.client_id",
                      '=',$idclient)
                    ->where("produits_has_clients.numComd",
                      '=',$numCmd)
                    ->get();
          
          // Lecture des commandes
           $comd = DB::table('commandes')
                    ->where('numComd', '=', $numCmd)
                    ->first(); 

          $output = '';

          $output.='
            <!-- Accent alert -->
            <div class="alert alert-accent" role="alert">
             <span>N°Comd: </span>'.$comd->numComd.'<br>
             <span>Livraison: </span>'.$comd->lieuLivraison.'
             <br>
              <span>Date: </span>'.$comd->dateComd.'
             <br>
            </div>
          ';

          foreach ($prodL as $prd) {
           $output.='
                    <!-- Product-->
                    <div class="media d-block d-sm-flex        align-items-center py-4 border-bottom">
                    
                      <a class="d-block mb-3 mb-sm-0 mr-sm-4 
                       mx-auto" href="marketplace-single.html" 
                       style="width: 12.5rem;">
                       <img class="rounded-lg" 
                       src='.$prd->img.' alt="Product">
                      </a>

                      <div class="media-body text-center 
                        text-sm-left">

                        <h3 class="h6 product-title mb-2">
                         <a href="#">
                         '.$prd->nom.'
                         </a>
                        </h3>

                        <div class="d-inline-block text-accent">   Prix:
                          <small>'.$prd->prix." ".getTDevise().'</small>
                        </div>

                        <div class="d-inline-block text-muted font-size-ms border-left ml-2 pl-2">
                          Qte: 
                         <span class="font-weight-medium">
                         '.$prd->qte.'
                         </span>
                        </div>

                        <div class="d-inline-block text-muted font-size-ms border-left ml-2 pl-2">
                         Montant: 
                         <span class="font-weight-medium">
                         '.$prd->qte*$prd->prix.'
                          <small>'.getTDevise().'</small></span>
                        </div>
                      </div>
                    </div>
           ';
          }
          /*dd($prodL);*/
          return $output;
       } 
       


      // Envoie de mail
       public function sendMail(Request $request)
       {
          $nom   = $request->nom;
          $mail  = $request->mail;
          $tel   = $request->tel;
          $sujet = $request->sujet;
          $msg   = $request->msg;

          //Envoie du mail
          Mail::to('admin@dianys.ci')->send(new SendMailcLT($nom,$mail,$tel,$sujet,$msg));


       }





}

?>