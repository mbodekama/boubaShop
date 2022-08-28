<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produits_has_attributs extends Model
{
    protected $fillable = ['produits_id','attributs_id'];
}
