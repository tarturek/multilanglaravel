<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PcategoryTranslation extends Model
{
    protected $table = 'pcategory_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','slug'];
}
