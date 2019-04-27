<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpageSetting extends Model
{
    protected $table = 'mpagesetting';
    protected $guarded = [];

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = [
        'title','text'
    ];

    protected $fillable = [

    ];
}
