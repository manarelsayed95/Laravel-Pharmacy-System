<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable  implements BannableContract
{
    use Notifiable;
    use Bannable;
    protected $guard = 'doctor';

    protected $fillable = [
        'name',
        'email',
        'image', 
        'password', 
        'national_id', 
        'ban_flag', 
        'pharmacy_id'
        
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
