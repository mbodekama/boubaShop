<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   protected $fillable = ['devises','mail','logo','site',
   'tel','lieu','heur','pass','year','about'];   
}
