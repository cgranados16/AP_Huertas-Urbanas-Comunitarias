<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateTreeOrderCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateTreeOrderCatalogAPIRequest;
use App\Models\Catalogs\TreeOrderCatalog;
use App\Repositories\Catalogs\TreeOrderCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TreeOrderCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class TreeOrderCatalogAPIController extends AppBaseController
{
    /** @var  TreeOrderCatalogRepository */
    private $treeOrderCatalogRepository;

    public function __construct(TreeOrderCatalogRepository $treeOrderCatalogRepo)
    {
        $this->treeOrderCatalogRepository = $treeOrderCatalogRepo;
    }

    /**
     * Display a listing of the TreeOrderCatalog.
     * GET|HEAD /treeOrderCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->treeOrderCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->treeOrderCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $treeOrderCatalogs = $this->treeOrderCatalogRepository->all();

        return $this->sendResponse($treeOrderCatalogs->toArray(), 'Tree Order Catalogs retrieved successfully');
    }

    /**
     * Display the specified TreeOrderCatalog.
     * GET|HEAD /treeOrderCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TreeOrderCatalog $treeOrderCatalog */
        $treeOrderCatalog = $this->treeOrderCatalogRepository->findWithoutFail($id);

        if (empty($treeOrderCatalog)) {
            return $this->sendError('Tree Order Catalog not found');
        }
        return $this->sendResponse($treeOrderCatalog->toArray(), 'Tree Order Catalog retrieved successfully');
    }


}
