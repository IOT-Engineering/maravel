<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Always capitalize the name when we save it to the database
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }
    
    /**
     * Always hash the password when we save it to the database
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function scopeCanView($query, $uri)
    {
        if($query->first()->role->name == 'admin')
        {
            return true;
        }
        else
        {
            return $query->with(['role.permissions'])->first()->role->permissions()
                ->where('uri','=', $uri)
                ->where('method','ILIKE', 'GET')
                ->exists();
        }
    }
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

}
