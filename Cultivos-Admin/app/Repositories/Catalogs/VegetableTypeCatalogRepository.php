<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\VegetableTypeCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VegetableTypeCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 7, 2018, 11:13 pm UTC
 *
 * @method VegetableTypeCatalog findWithoutFail($id, $columns = ['*'])
 * @method VegetableTypeCatalog find($id, $columns = ['*'])
 * @method VegetableTypeCatalog first($columns = ['*'])
*/
class VegetableTypeCatalogRepository extends BaseRepository
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
        return VegetableTypeCatalog::class;
    }
}
