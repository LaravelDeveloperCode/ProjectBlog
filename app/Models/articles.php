<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class articles extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'articles';

    function getCategory()
    {
        return $this->hasOne('App\Models\Categories','id','category_id'); //Categoriesdeki "id" ile Articlies ki, "id" tapsin
    }
    
}
