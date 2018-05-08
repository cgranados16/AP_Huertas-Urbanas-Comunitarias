<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\FertilizerCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FertilizerCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 8, 2018, 5:05 am UTC
 *
 * @method FertilizerCatalog findWithoutFail($id, $columns = ['*'])
 * @method FertilizerCatalog find($id, $columns = ['*'])
 * @method FertilizerCatalog first($columns = ['*'])
*/
class FertilizerCatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FertilizerCatalog::class;
    }
}
