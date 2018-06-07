<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HarvestBySale extends Model
{
    public $table = 'HarvestBySale';
    public $timestamps = false;

    public function harvest()
    {
        return $this->hasOne(Harvest::class,'id','IdHarvest');
    }

    public function subtotal()
    {
        
        return $this->harvest->Price*$this->Quantity;
    }

}
