<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class pharmacy extends Model
{

    use Notifiable;
    use HasRoles;
    protected $fillable = [
     
       'created_at',
       'name',
       'email',
       'password',
       'national_id',
       'revenue',
       'image',
       'area_id'
        
    ];
}
