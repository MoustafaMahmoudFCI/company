<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title' , 'image' , 'desc' , 'link' , 'back_image'
    ];
}
