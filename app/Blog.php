<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $guarded = [];

    function category(){
        return $this->belongsTo('App\BlogCategory','category');
    }
    use \Dimsav\Translatable\Translatable;


    public $translatedAttributes = [
        'title','content','slug'
    ];

    protected $fillable = [
        'image',
        ];



}
