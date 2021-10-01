<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    //
    protected $fillable = [
        'periode', 'horraire_un','horaire_deux','id_espace'
      ];
}
