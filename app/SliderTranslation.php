<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $table = 'slider_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['text1','buttontext'];
}
