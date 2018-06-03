<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $dates = ['Date'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'IdClient');
    }
}
