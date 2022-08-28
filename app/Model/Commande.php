<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
   protected $fillable = ['montant','dateComd','numComd','Statut',
                          'paiement','client_id','lieuLivraison','solde'];   
}
