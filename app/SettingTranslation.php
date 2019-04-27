<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    protected $table = 'setting_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['title','content','slug'];
}
