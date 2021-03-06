<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    public $table = 'Trade';

    public function garden()
    {
        return $this->belongsTo(Garden::class,'IdGarden');
    }

    public function client()
    {
        return $this->belongsTo(User::class,'IdClient');
    }

    public function items()
    {
        return $this->hasMany(HarvestByTrade::class,'IdTrade');
    }
}
