<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Models\Role as Role;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'system_managers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','first_name', 'email', 'password','gender', 'birth_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
