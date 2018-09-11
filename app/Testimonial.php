<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * The attributes that are mass assignable.
     **/
    
    protected $fillable = [
        'name' , 'position' , 'desc' , 'user_id'
    ];
}
