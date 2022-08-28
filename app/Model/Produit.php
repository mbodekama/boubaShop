<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
   protected $fillable = ['nom','prix','quantite','img','description',
                          'categorie_id','slug','idsctg','fakePrice','statut'];   
}
