<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'name' , 'type' , 'ar_content' , 'en_setting' , 'slug'
    ];
}
