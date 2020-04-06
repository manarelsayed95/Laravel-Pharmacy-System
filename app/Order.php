<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'is_insured',
        'status',
        'action',
        'delivering address'
    ];
}
