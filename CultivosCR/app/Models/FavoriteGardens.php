<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteGardens extends Model
{
    public $table = 'favorite_gardens';
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(User::class,'IdClient');
    }
}
