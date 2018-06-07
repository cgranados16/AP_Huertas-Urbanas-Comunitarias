<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $table = 'sale';

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
        return $this->hasMany(HarvestBySale::class,'IdSale');
    }


}
