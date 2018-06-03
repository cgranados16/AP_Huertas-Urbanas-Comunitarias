<?php

namespace App\Models\Catalogs;

use Eloquent as Model;

/**
 * Class TreeFamilyCatalog
 * @package App\Models\Catalogs
 * @version April 8, 2018, 3:24 am UTC
 *
 * @property string Name
 * @property string Description
 */
class TreeFamilyCatalog extends Model
{

    public $table = 'TreeFamilyCatalog';
    


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
