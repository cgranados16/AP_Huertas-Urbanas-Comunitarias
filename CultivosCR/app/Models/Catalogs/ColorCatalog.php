<?php

namespace App\Models\Catalogs;

use Eloquent as Model;

/**
 * Class ColorCatalog
 * @package App\Models\Catalogs
 * @version April 7, 2018, 11:04 pm UTC
 *
 * @property string Name
 * @property string Description
 * @property string ColorHexCode
 */
class ColorCatalog extends Model
{

    public $table = 'ColorCatalog';
    


    public $fillable = [
        'Name',
        'Description',
        'ColorHexCode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Description' => 'string',
        'ColorHexCode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
        'Description' => 'required',
        'ColorHexCode' => 'required'
    ];

    
}
