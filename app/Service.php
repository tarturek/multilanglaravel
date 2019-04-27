<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $guarded = [];


    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = [
        'title','content','slug'
    ];

    protected $fillable = [
        'image'
    ];
}
