<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    public $timestamps = false;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeLastUsers($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function  hasAccess(array $premissions) : bool
    {
        foreach ($this->roles as $role) {
            if($role->hasAccess($premissions)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($roleSlug) : bool
    {
        return $this->roles()->where('name', $roleSlug)->count() == 1;
    }

}
