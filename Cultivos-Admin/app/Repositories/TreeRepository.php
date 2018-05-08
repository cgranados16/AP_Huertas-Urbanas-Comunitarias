<?php

namespace App\Repositories;

use App\Models\Tree;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TreeRepository
 * @package App\Repositories
 * @version April 8, 2018, 6:06 pm UTC
 *
 * @method Tree findWithoutFail($id, $columns = ['*'])
 * @method Tree find($id, $columns = ['*'])
 * @method Tree first($columns = ['*'])
*/
class TreeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Order',
        'InDanger'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tree::class;
    }
}
