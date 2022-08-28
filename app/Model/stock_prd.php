<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class stock_prd extends Model
{
    protected $fillable=['taille', 'couleur', 'pointure', 'epaisseur', 'qte', 'prixPrd', 'produits_id'];
}
