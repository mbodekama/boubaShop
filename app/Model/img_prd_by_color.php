<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class img_prd_by_color extends Model
{
    protected $fillable = ['lien', 'produits_id', 'attributs_id'];
}
