<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateVegetableTypeCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateVegetableTypeCatalogAPIRequest;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Repositories\Catalogs\VegetableTypeCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VegetableTypeCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class VegetableTypeCatalogAPIController extends AppBaseController
{
    /** @var  VegetableTypeCatalogRepository */
    private $vegetableTypeCatalogRepository;

    public function __construct(VegetableTypeCatalogRepository $vegetableTypeCatalogRepo)
    {
        $this->vegetableTypeCatalogRepository = $vegetableTypeCatalogRepo;
    }

    /**
     * Display a listing of the VegetableTypeCatalog.
     * GET|HEAD /vegetableTypeCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vegetableTypeCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->vegetableTypeCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vegetableTypeCatalogs = $this->vegetableTypeCatalogRepository->all();

        return $this->sendResponse($vegetableTypeCatalogs->toArray(), 'Vegetable Type Catalogs retrieved successfully');
    }

    /**
     * Store a newly created VegetableTypeCatalog in storage.
     * POST /vegetableTypeCatalogs
     *
     * @param CreateVegetableTypeCatalogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVegetableTypeCatalogAPIRequest $request)
    {
        $input = $request->all();

        $vegetableTypeCatalogs = $this->vegetableTypeCatalogRepository->create($input);

        return $this->sendResponse($vegetableTypeCatalogs->toArray(), 'Vegetable Type Catalog saved successfully');
    }

    /**
     * Display the specified VegetableTypeCatalog.
     * GET|HEAD /vegetableTypeCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VegetableTypeCatalog $vegetableTypeCatalog */
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            return $this->sendError('Vegetable Type Catalog not found');
        }

        return $this->sendResponse($vegetableTypeCatalog->toArray(), 'Vegetable Type Catalog retrieved successfully');
    }

    /**
     * Update the specified VegetableTypeCatalog in storage.
     * PUT/PATCH /vegetableTypeCatalogs/{id}
     *
     * @param  int $id
     * @param UpdateVegetableTypeCatalogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVegetableTypeCatalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var VegetableTypeCatalog $vegetableTypeCatalog */
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            return $this->sendError('Vegetable Type Catalog not found');
        }

        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->update($input, $id);

        return $this->sendResponse($vegetableTypeCatalog->toArray(), 'VegetableTypeCatalog updated successfully');
    }

    /**
     * Remove the specified VegetableTypeCatalog from storage.
     * DELETE /vegetableTypeCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VegetableTypeCatalog $vegetableTypeCatalog */
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            return $this->sendError('Vegetable Type Catalog not found');
        }

        $vegetableTypeCatalog->delete();

        return $this->sendResponse($id, 'Vegetable Type Catalog deleted successfully');
    }
}
