<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateFertilizerCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateFertilizerCatalogAPIRequest;
use App\Models\Catalogs\FertilizerCatalog;
use App\Repositories\Catalogs\FertilizerCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FertilizerCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class FertilizerCatalogAPIController extends AppBaseController
{
    /** @var  FertilizerCatalogRepository */
    private $fertilizerCatalogRepository;

    public function __construct(FertilizerCatalogRepository $fertilizerCatalogRepo)
    {
        $this->fertilizerCatalogRepository = $fertilizerCatalogRepo;
    }

    /**
     * Display a listing of the FertilizerCatalog.
     * GET|HEAD /fertilizerCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fertilizerCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->fertilizerCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fertilizerCatalogs = $this->fertilizerCatalogRepository->all();

        return $this->sendResponse($fertilizerCatalogs->toArray(), 'Fertilizer Catalogs retrieved successfully');
    }

    /**
     * Store a newly created FertilizerCatalog in storage.
     * POST /fertilizerCatalogs
     *
     * @param CreateFertilizerCatalogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFertilizerCatalogAPIRequest $request)
    {
        $input = $request->all();

        $fertilizerCatalogs = $this->fertilizerCatalogRepository->create($input);

        return $this->sendResponse($fertilizerCatalogs->toArray(), 'Fertilizer Catalog saved successfully');
    }

    /**
     * Display the specified FertilizerCatalog.
     * GET|HEAD /fertilizerCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FertilizerCatalog $fertilizerCatalog */
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            return $this->sendError('Fertilizer Catalog not found');
        }

        return $this->sendResponse($fertilizerCatalog->toArray(), 'Fertilizer Catalog retrieved successfully');
    }

    /**
     * Update the specified FertilizerCatalog in storage.
     * PUT/PATCH /fertilizerCatalogs/{id}
     *
     * @param  int $id
     * @param UpdateFertilizerCatalogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFertilizerCatalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var FertilizerCatalog $fertilizerCatalog */
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            return $this->sendError('Fertilizer Catalog not found');
        }

        $fertilizerCatalog = $this->fertilizerCatalogRepository->update($input, $id);

        return $this->sendResponse($fertilizerCatalog->toArray(), 'FertilizerCatalog updated successfully');
    }

    /**
     * Remove the specified FertilizerCatalog from storage.
     * DELETE /fertilizerCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FertilizerCatalog $fertilizerCatalog */
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            return $this->sendError('Fertilizer Catalog not found');
        }

        $fertilizerCatalog->delete();

        return $this->sendResponse($id, 'Fertilizer Catalog deleted successfully');
    }
}
