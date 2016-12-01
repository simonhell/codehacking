<?php

namespace App;
use App\Photos;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
       return $this->belongsTo('App\Role');
    }

    public function getIsActiveStringAttribute()
    {
        if($this->is_active == 1)
            return "Active";
        else
            return "Not Active";
    }

    public function photo()
    {
        return $this->belongsTo('App\Photos');
    }

    public function isAdmin()
    {
        if( $this->role_id == Role  ::where('name','administrator')->first()->id && $this->isActive() )
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function isActive()
    {
        if($this->is_active == 1)
            return true;
        else
            return false;
    }

}
