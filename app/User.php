<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone_number', 'image', 'gender', 'date_of_birth', 'role_id', 'status_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function hasAnyRoles($roles)
    {
        if (
            $this->roles()
                ->whereIn('name', $roles)
                ->first()
        ) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if (
            $this->roles()
                ->where('name', $role)
                ->first()
        ) {
            return true;
        }
        return false;
    }

    public function isActive($status)
    {
        if (
            $this->status()
                ->where('name', $status)
                ->first()
        ) {
            return true;
        }
        return false;
    }
}
