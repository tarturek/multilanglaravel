<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $table = 'blog_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','content','slug'];
}
