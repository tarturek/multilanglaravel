<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{


    protected $table = 'service_translation';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['sitename','footer_text','adress'];
}
