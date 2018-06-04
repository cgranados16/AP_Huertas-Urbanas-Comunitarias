<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    public $table = 'harvest';

    public function garden()
    {
        return $this->belongsTo(Garden::class, 'Garden');
    }

    public function harvest()
    {
        if($this->HarvestType === 1){
            return $this->belongsTo(Tree::class, 'Harvest');
        }else if ($this->HarvestType === 2){
            return $this->belongsTo(Vegetable::class, 'Harvest');
        }
    }

    public function harvest_type()
    {
        return $this->belongsTo(HarvestType::class, 'HarvestType');
    }
    
}
