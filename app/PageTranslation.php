<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = 'page_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','content','slug'];
}
