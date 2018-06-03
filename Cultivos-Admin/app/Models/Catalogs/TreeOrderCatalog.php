<?php

namespace App\Models\Catalogs;

use Eloquent as Model;

/**
 * Class TreeOrderCatalog
 * @package App\Models\Catalogs
 * @version April 8, 2018, 5:42 pm UTC
 *
 * @property \App\Models\Catalogs\TreeFamilyOrder treeFamilyOrder
 * @property integer IdFamily
 * @property string Name
 */
class TreeOrderCatalog extends Model
{

    public $table = 'TreeOrderCatalog';
    


    public $fillable = [
        'IdFamily',
        'Name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'IdFamily' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function family()
    {
        return $this->hasOne(\App\Models\Catalogs\treeFamilyCatalog::class, 'id');
    }
}
