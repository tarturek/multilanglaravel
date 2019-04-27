<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected $table = 'page';
    protected $guarded = [];


    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = [
       'title','content','slug'
    ];

    protected $fillable = [
        'photo'
    ];

}
