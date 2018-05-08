<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateTreeFamilyCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateTreeFamilyCatalogAPIRequest;
use App\Models\Catalogs\TreeFamilyCatalog;
use App\Repositories\Catalogs\TreeFamilyCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TreeFamilyCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class TreeFamilyCatalogAPIController extends AppBaseController
{
    /** @var  TreeFamilyCatalogRepository */
    private $treeFamilyCatalogRepository;

    public function __construct(TreeFamilyCatalogRepository $treeFamilyCatalogRepo)
    {
        $this->treeFamilyCatalogRepository = $treeFamilyCatalogRepo;
    }

    /**
     * Display a listing of the TreeFamilyCatalog.
     * GET|HEAD /treeFamilyCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->treeFamilyCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->treeFamilyCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $treeFamilyCatalogs = $this->treeFamilyCatalogRepository->all();

        return $this->sendResponse($treeFamilyCatalogs->toArray(), 'Tree Family Catalogs retrieved successfully');
    }

    /**
     * Store a newly created TreeFamilyCatalog in storage.
     * POST /treeFamilyCatalogs
     *
     * @param CreateTreeFamilyCatalogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTreeFamilyCatalogAPIRequest $request)
    {
        $input = $request->all();

        $treeFamilyCatalogs = $this->treeFamilyCatalogRepository->create($input);

        return $this->sendResponse($treeFamilyCatalogs->toArray(), 'Tree Family Catalog saved successfully');
    }

    /**
     * Display the specified TreeFamilyCatalog.
     * GET|HEAD /treeFamilyCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TreeFamilyCatalog $treeFamilyCatalog */
        $treeFamilyCatalog = $this->treeFamilyCatalogRepository->findWithoutFail($id);

        if (empty($treeFamilyCatalog)) {
            return $this->sendError('Tree Family Catalog not found');
        }

        return $this->sendResponse($treeFamilyCatalog->toArray(), 'Tree Family Catalog retrieved successfully');
    }

    /**
     * Update the specified TreeFamilyCatalog in storage.
     * PUT/PATCH /treeFamilyCatalogs/{id}
     *
     * @param  int $id
     * @param UpdateTreeFamilyCatalogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTreeFamilyCatalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var TreeFamilyCatalog $treeFamilyCatalog */
        $treeFamilyCatalog = $this->treeFamilyCatalogRepository->findWithoutFail($id);

        if (empty($treeFamilyCatalog)) {
            return $this->sendError('Tree Family Catalog not found');
        }

        $treeFamilyCatalog = $this->treeFamilyCatalogRepository->update($input, $id);

        return $this->sendResponse($treeFamilyCatalog->toArray(), 'TreeFamilyCatalog updated successfully');
    }

    /**
     * Remove the specified TreeFamilyCatalog from storage.
     * DELETE /treeFamilyCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TreeFamilyCatalog $treeFamilyCatalog */
        $treeFamilyCatalog = $this->treeFamilyCatalogRepository->findWithoutFail($id);

        if (empty($treeFamilyCatalog)) {
            return $this->sendError('Tree Family Catalog not found');
        }

        $treeFamilyCatalog->delete();

        return $this->sendResponse($id, 'Tree Family Catalog deleted successfully');
    }
}
