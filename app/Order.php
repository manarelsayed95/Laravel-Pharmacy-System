<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Doctor;
use App\OrderMedicine;
use App\Status;
class Order extends Model
{
    protected $fillable=[
        'is_insured',
        'action',
        'delivering_address',
        'user_id',
        'doctor_id',
        'pharmacy_id',
        'status_id'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Doctor(){
        return $this->belongsTo('App\Doctor');
    }
    public function Status(){
        return $this->belongsTo('App\Status');
    }
}
