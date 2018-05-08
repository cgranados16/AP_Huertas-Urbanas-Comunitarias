<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Tree
 * @package App\Models
 * @version April 8, 2018, 6:06 pm UTC
 *
 * @property \App\Models\TreeOrderCatalog treeOrderCatalog
 * @property string Name
 * @property integer Order
 * @property boolean InDanger
 */
class Tree extends Model
{

    public $table = 'trees';
    


    public $fillable = [
        'Name',
        'Order',
        'InDanger'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Order' => 'integer',
        'InDanger' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Name' => 'required',
        'InDanger' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function treeOrderCatalog()
    {
        return $this->hasOne(\App\Models\TreeOrderCatalog::class, 'id');
    }
}
