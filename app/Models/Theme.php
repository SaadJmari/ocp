<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model 
{

    protected $table = 'Themes';
    public $timestamps = true;
    protected $fillable = ['Name_Theme', 'Description_Theme', 'Domaine_id'];

    public function Domaines()
    {
        return $this->belongsTo('App\Models\Domaine', 'Domaine_id');
    }

}
