<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    protected $table = 'gallery_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title'];
}
