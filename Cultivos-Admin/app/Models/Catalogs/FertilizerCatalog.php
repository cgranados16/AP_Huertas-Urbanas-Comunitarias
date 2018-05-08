<?php

namespace App\Models\Catalogs;

use Eloquent as Model;

/**
 * Class FertilizerCatalog
 * @package App\Models\Catalogs
 * @version April 8, 2018, 5:05 am UTC
 *
 * @property string Description
 */
class FertilizerCatalog extends Model
{

    public $table = 'FertilizerCatalog';
    


    public $fillable = [
        'Description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Description' => 'required'
    ];

    
}
