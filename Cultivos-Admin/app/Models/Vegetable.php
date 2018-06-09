<?php

namespace App\Models;
use App\Models\Catalogs\ColorCatalog;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Models\Catalogs\VegetablePropertiesCatalog;

use Eloquent as Model;

/**
 * Class Vegetable
 * @package App\Models
 * @version April 15, 2018, 4:40 am UTC
 *
 * @property string Name
 */
class Vegetable extends Model
{

    public $table = 'vegetables';
    


    public $fillable = [
        'Name','Color','Type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
    ];

    public function color()
    {
        return $this->belongsTo(ColorCatalog::class, 'Color');
    }

    public function type()
    {
        return $this->belongsTo(VegetableTypeCatalog::class, 'Type');
    }

    public function properties()
    {
        return $this->belongsToMany(VegetablePropertiesCatalog::class, 'properties_per_vegetable','Vegetable','Property');
    }

    public function photos()
    {
        return $this->hasMany(PhotosPerVegetable::class,'IdVegetable','id');
    }

    
}
