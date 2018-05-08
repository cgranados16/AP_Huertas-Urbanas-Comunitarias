<?php

namespace App\Models\Catalogs;

use Eloquent as Model;

/**
 * Class VegetableTypeCatalog
 * @package App\Models\Catalogs
 * @version April 7, 2018, 11:13 pm UTC
 *
 * @property string Name
 * @property string Description
 */
class VegetableTypeCatalog extends Model
{

    public $table = 'VegetableTypeCatalog';
    


    public $fillable = [
        'Name',
        'Description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
        'Description' => 'required'
    ];

    
}
