<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
   protected $fillable = ['livraison','ville_id','ville_pays_id','delais_liv'];   
}
