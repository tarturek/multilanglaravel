<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $guarded = [];

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = [
        'title'
    ];

    protected $fillable = [
        'image','order'
    ];
}
