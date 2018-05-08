<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Requests\Catalogs\CreateColorCatalogRequest;
use App\Http\Requests\Catalogs\UpdateColorCatalogRequest;
use App\Repositories\Catalogs\ColorCatalogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lang;

class ColorCatalogController extends AppBaseController
{
    /** @var  ColorCatalogRepository */
    private $colorCatalogRepository;
    public function __construct(ColorCatalogRepository $colorCatalogRepo)
    {
        $this->middleware('auth');
        $this->colorCatalogRepository = $colorCatalogRepo;
    }

    /**
     * Display a listing of the ColorCatalog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->colorCatalogRepository->pushCriteria(new RequestCriteria($request));
        $colorCatalogs = $this->colorCatalogRepository->all();

        return view('catalogs.color_catalogs.index')
            ->with('colorCatalogs', $colorCatalogs);
    }

     /**
     * Display a listing of the ColorCatalog.
     *
     * @param Request $request
     * @return Response
     */
    public function get(Request $request)
    {
        $this->colorCatalogRepository->pushCriteria(new RequestCriteria($request));
        $colorCatalogs = $this->colorCatalogRepository->all();

        return $colorCatalogs;
    }

    /**
     * Show the form for creating a new ColorCatalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogs.color_catalogs.create');
    }

    /**
     * Store a newly created ColorCatalog in storage.
     *
     * @param CreateColorCatalogRequest $request
     *
     * @return Response
     */
    public function store(CreateColorCatalogRequest $request)
    {
        $input = $request->all();

        $colorCatalog = $this->colorCatalogRepository->create($input);

        Flash::success(Lang::get('catalogs/color_catalog.success'));

        return redirect(route('catalogs.colorCatalogs.index'));
    }

    /**
     * Display the specified ColorCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            Flash::error(Lang::get('catalogs/color_catalog.not found'));

            return redirect(route('catalogs.colorCatalogs.index'));
        }

        return view('catalogs.color_catalogs.show')->with('colorCatalog', $colorCatalog);
    }

    /**
     * Show the form for editing the specified ColorCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            Flash::error(Lang::get('catalogs/color_catalog.not found'));

            return redirect(route('catalogs.colorCatalogs.index'));
        }

        return view('catalogs.color_catalogs.edit')->with('colorCatalog', $colorCatalog);
    }

    /**
     * Update the specified ColorCatalog in storage.
     *
     * @param  int              $id
     * @param UpdateColorCatalogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateColorCatalogRequest $request)
    {
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            Flash::error(Lang::get('catalogs/color_catalog.not found'));

            return redirect(route('catalogs.colorCatalogs.index'));
        }

        $colorCatalog = $this->colorCatalogRepository->update($request->all(), $id);

        Flash::success(Lang::get('catalogs/color_catalog.not found'));

        return redirect(route('catalogs.colorCatalogs.index'));
    }

    /**
     * Remove the specified ColorCatalog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $colorCatalog = $this->colorCatalogRepository->findWithoutFail($id);

        if (empty($colorCatalog)) {
            Flash::error(Lang::get('catalogs/color_catalog.not found'));

            return redirect(route('catalogs.colorCatalogs.index'));
        }

        $this->colorCatalogRepository->delete($id);

        Flash::success(Lang::get('catalogs/color_catalog.delete'));

        return redirect(route('catalogs.colorCatalogs.index'));
    }

}
