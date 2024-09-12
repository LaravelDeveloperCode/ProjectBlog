<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function ArticleCount()
    {
        return $this->hasMany('App\Models\Articles','category_id','id')->where('status',1)->count();
                            //Baglanacagimiz Model ,//Baglanilacaq sutun ,//Baglanilacaq "id"
    }
}
