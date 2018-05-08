<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\TreeFamilyCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TreeFamilyCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 8, 2018, 3:24 am UTC
 *
 * @method TreeFamilyCatalog findWithoutFail($id, $columns = ['*'])
 * @method TreeFamilyCatalog find($id, $columns = ['*'])
 * @method TreeFamilyCatalog first($columns = ['*'])
*/
class TreeFamilyCatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TreeFamilyCatalog::class;
    }
}
