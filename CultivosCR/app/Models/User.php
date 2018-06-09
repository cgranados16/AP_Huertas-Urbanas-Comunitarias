<?php

namespace App\Models;

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
        'first_name','last_name', 'email', 'password','gender', 'birth_date'
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

    public function gardens()
    {
        return $this->hasMany(Garden::class,'IdManager');
    }

    public function favoriteGardens()
    {
        return $this->belongsToMany(Garden::class,'favorite_gardens','IdClient','IdGarden');
    }

    public function photo()
    {
        if ($this->photo){
            return $this->photo;
        }else{
            return 'photos/users/default.png';
        }
    }


}
