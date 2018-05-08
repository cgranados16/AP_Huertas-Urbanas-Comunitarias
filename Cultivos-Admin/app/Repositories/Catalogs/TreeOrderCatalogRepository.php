<?php

namespace App\Repositories\Catalogs;

use App\Models\Catalogs\TreeOrderCatalog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TreeOrderCatalogRepository
 * @package App\Repositories\Catalogs
 * @version April 8, 2018, 5:42 pm UTC
 *
 * @method TreeOrderCatalog findWithoutFail($id, $columns = ['*'])
 * @method TreeOrderCatalog find($id, $columns = ['*'])
 * @method TreeOrderCatalog first($columns = ['*'])
*/
class TreeOrderCatalogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'IdFamily',
        'Name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TreeOrderCatalog::class;
    }
}
