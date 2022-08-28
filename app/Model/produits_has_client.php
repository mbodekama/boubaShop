<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produits_has_client extends Model
{
   protected $fillable = ['produits_id','produits_categorie_id','client_id','qte','montant','datecomd','numComd'];   
}
