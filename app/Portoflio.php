<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portoflio extends Model
{
    protected $fillable = [
        'title' , 'image' , 'cat_id' , 'desc'
    ];
}
