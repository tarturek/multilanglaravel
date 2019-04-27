<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslation extends Model
{
    protected $table = 'blogcategory_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','slug'];
}
