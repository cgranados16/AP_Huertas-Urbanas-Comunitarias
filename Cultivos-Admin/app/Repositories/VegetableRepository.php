<?php

namespace App\Repositories;

use App\Models\Vegetable;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VegetableRepository
 * @package App\Repositories
 * @version April 15, 2018, 4:40 am UTC
 *
 * @method Vegetable findWithoutFail($id, $columns = ['*'])
 * @method Vegetable find($id, $columns = ['*'])
 * @method Vegetable first($columns = ['*'])
*/
class VegetableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vegetable::class;
    }
}
