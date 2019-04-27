<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $guarded = [];

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = [
        'sitename','footer_text','adress'
    ];

    protected $fillable = [
        'phone1','phone2','email','logo','favicon','googlemap','facebook','instagram','twitter','linkedin','youtube'
    ];
}
