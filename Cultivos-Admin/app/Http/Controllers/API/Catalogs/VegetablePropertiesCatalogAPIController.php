<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateVegetablePropertiesCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateVegetablePropertiesCatalogAPIRequest;
use App\Models\Catalogs\VegetablePropertiesCatalog;
use App\Repositories\Catalogs\VegetablePropertiesCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VegetablePropertiesCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class VegetablePropertiesCatalogAPIController extends AppBaseController
{
    /** @var  VegetablePropertiesCatalogRepository */
    private $vegetablePropertiesCatalogRepository;

    public function __construct(VegetablePropertiesCatalogRepository $vegetablePropertiesCatalogRepo)
    {
        $this->vegetablePropertiesCatalogRepository = $vegetablePropertiesCatalogRepo;
    }

    /**
     * Display a listing of the VegetablePropertiesCatalog.
     * GET|HEAD /vegetablePropertiesCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vegetablePropertiesCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->vegetablePropertiesCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $vegetablePropertiesCatalogs = $this->vegetablePropertiesCatalogRepository->all();

        return $this->sendResponse($vegetablePropertiesCatalogs->toArray(), 'Vegetable Properties Catalogs retrieved successfully');
    }

    /**
     * Store a newly created VegetablePropertiesCatalog in storage.
     * POST /vegetablePropertiesCatalogs
     *
     * @param CreateVegetablePropertiesCatalogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVegetablePropertiesCatalogAPIRequest $request)
    {
        $input = $request->all();

        $vegetablePropertiesCatalogs = $this->vegetablePropertiesCatalogRepository->create($input);

        return $this->sendResponse($vegetablePropertiesCatalogs->toArray(), 'Vegetable Properties Catalog saved successfully');
    }

    /**
     * Display the specified VegetablePropertiesCatalog.
     * GET|HEAD /vegetablePropertiesCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VegetablePropertiesCatalog $vegetablePropertiesCatalog */
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            return $this->sendError('Vegetable Properties Catalog not found');
        }

        return $this->sendResponse($vegetablePropertiesCatalog->toArray(), 'Vegetable Properties Catalog retrieved successfully');
    }

    /**
     * Update the specified VegetablePropertiesCatalog in storage.
     * PUT/PATCH /vegetablePropertiesCatalogs/{id}
     *
     * @param  int $id
     * @param UpdateVegetablePropertiesCatalogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVegetablePropertiesCatalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var VegetablePropertiesCatalog $vegetablePropertiesCatalog */
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            return $this->sendError('Vegetable Properties Catalog not found');
        }

        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->update($input, $id);

        return $this->sendResponse($vegetablePropertiesCatalog->toArray(), 'VegetablePropertiesCatalog updated successfully');
    }

    /**
     * Remove the specified VegetablePropertiesCatalog from storage.
     * DELETE /vegetablePropertiesCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VegetablePropertiesCatalog $vegetablePropertiesCatalog */
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            return $this->sendError('Vegetable Properties Catalog not found');
        }

        $vegetablePropertiesCatalog->delete();

        return $this->sendResponse($id, 'Vegetable Properties Catalog deleted successfully');
    }
}
