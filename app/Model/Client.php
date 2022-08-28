<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $fillable = ['nom','prenom','domicile','ville',
   'pays','numero_telephone','mail','pass'];   
}
