<?php

namespace App\Http\Controllers\API\Catalogs;

use App\Http\Requests\API\Catalogs\CreateColorCatalogAPIRequest;
use App\Http\Requests\API\Catalogs\UpdateColorCatalogAPIRequest;
use App\Models\Catalogs\ColorCatalog;
use App\Repositories\Catalogs\ColorCatalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ColorCatalogController
 * @package App\Http\Controllers\API\Catalogs
 */

class ColorCatalogAPIController extends AppBaseController
{
    /** @var  ColorCatalogRepository */
    private $colorCatalogRepository;

    public function __construct(ColorCatalogRepository $colorCatalogRepo)
    {
        $this->colorCatalogRepository = $colorCatalogRepo;
    }

    /**
     * Display a listing of the ColorCatalog.
     * GET|HEAD /colorCatalogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->colorCatalogRepository->pushCriteria(new RequestCriteria($request));
        $this->colorCatalogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $colorCatalogs = $this->colorCatalogRepository->all();

        return $this->sendResponse($colorCatalogs->toArray(), 'Color Catalogs retrieved successfully');
    }

    /**
     * Store a newly created ColorCatalog in storage.
     * POST /colorCatalogs
     *
     * @param CreateColorCatalogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateColorCatalogAPIRequest $request)
    {
        $input = $request->all();

        $colorCatalogs = $this->colorCatalogRepository->create($input);

        return $this->sendResponse($colorCatalogs->toArray(), 'Color Catalog saved successfully');
    }

    /**
     * Display the specified ColorCatalog.
     * GET|HEAD /colorCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ColorCatalog $colorCatalog */
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            return $this->sendError('Color Catalog not found');
        }

        return $this->sendResponse($colorCatalog->toArray(), 'Color Catalog retrieved successfully');
    }

    /**
     * Update the specified ColorCatalog in storage.
     * PUT/PATCH /colorCatalogs/{id}
     *
     * @param  int $id
     * @param UpdateColorCatalogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorCatalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var ColorCatalog $colorCatalog */
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            return $this->sendError('Color Catalog not found');
        }

        $colorCatalog = $this->colorCatalogRepository->update($input, $id);

        return $this->sendResponse($colorCatalog->toArray(), 'ColorCatalog updated successfully');
    }

    /**
     * Remove the specified ColorCatalog from storage.
     * DELETE /colorCatalogs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ColorCatalog $colorCatalog */
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            return $this->sendError('Color Catalog not found');
        }

        $colorCatalog->delete();

        return $this->sendResponse($id, 'Color Catalog deleted successfully');
    }
}
