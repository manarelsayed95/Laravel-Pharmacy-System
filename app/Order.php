<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Order extends Model
{
    protected $fillable=[
        'is_insured',
        'status',
        'action',
        'delivering address',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
}
