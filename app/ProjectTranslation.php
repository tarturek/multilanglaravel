<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $table = 'project_translation';
    protected  $guarded = [];
    public $timestamps = false;
    protected $fillable =
        ['title','client','location','type','content','slug'
    ];

}


