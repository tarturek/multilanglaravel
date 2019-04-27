<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpageSettingTranslation extends Model
{
    protected $table = 'mpagesetting_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','text'];
}
