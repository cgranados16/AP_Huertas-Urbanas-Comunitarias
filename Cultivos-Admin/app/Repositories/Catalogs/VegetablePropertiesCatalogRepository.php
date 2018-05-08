<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\VegetablePropertiesCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VegetablePropertiesCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 8, 2018, 2:54 am UTC
 *
 * @method VegetablePropertiesCatalog findWithoutFail($id, $columns = ['*'])
 * @method VegetablePropertiesCatalog find($id, $columns = ['*'])
 * @method VegetablePropertiesCatalog first($columns = ['*'])
*/
class VegetablePropertiesCatalogRepository extends BaseRepository
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
        return VegetablePropertiesCatalog::class;
    }
}
