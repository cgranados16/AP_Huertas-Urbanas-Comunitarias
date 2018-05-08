<?php

namespace App\Models\Catalogs;
use App\Models\Vegetable;

use Eloquent as Model;

/**
 * Class VegetablePropertiesCatalog
 * @package App\Models\Catalogs
 * @version April 8, 2018, 2:54 am UTC
 *
 * @property string Name
 */
class VegetablePropertiesCatalog extends Model
{

    public $table = 'VegetablePropertiesCatalog';
    


    public $fillable = [
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required'
    ];

    public function vegetables()
    {
        return $this->belongsToMany(Vegetable::class, 'properties_per_vegetable','Property','Vegetable');
    }
    
    
}
