<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HarvestByTrade extends Model
{
    public $table = 'HarvestByTrade';
    public $timestamps = false;

    public function harvest()
    {
        return $this->hasOne(Harvest::class,'id','IdHarvest');
    }

}
