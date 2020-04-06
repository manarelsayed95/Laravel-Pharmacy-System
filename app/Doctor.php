<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'image', 
        'password', 
        'national_id', 
        'ban_flag', 
        'pharmacy_id'
        
    ];
}
