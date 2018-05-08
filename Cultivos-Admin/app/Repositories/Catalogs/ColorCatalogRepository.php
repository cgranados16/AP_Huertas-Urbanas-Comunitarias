<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\ColorCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ColorCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 7, 2018, 11:04 pm UTC
 *
 * @method ColorCatalog findWithoutFail($id, $columns = ['*'])
 * @method ColorCatalog find($id, $columns = ['*'])
 * @method ColorCatalog first($columns = ['*'])
*/
class ColorCatalogRepository extends BaseRepository
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
        return ColorCatalog::class;
    }
}
