<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='project';
    protected $guarded = [];

    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = [
        'title','client','location','type','content','slug'
    ];

    protected $fillable = [
        'image','date','projectcategory'
    ];

    function category(){
        return $this->belongsTo('App\Pcategory','projectcategory');
    }
}

