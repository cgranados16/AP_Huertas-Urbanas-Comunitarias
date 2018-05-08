<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Requests\Catalogs\CreateVegetableTypeCatalogRequest;
use App\Http\Requests\Catalogs\UpdateVegetableTypeCatalogRequest;
use App\Repositories\Catalogs\VegetableTypeCatalogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lang;

class VegetableTypeCatalogController extends AppBaseController
{
    /** @var  VegetableTypeCatalogRepository */
    private $vegetableTypeCatalogRepository;

    public function __construct(VegetableTypeCatalogRepository $vegetableTypeCatalogRepo)
    {
        $this->middleware('auth');
        $this->vegetableTypeCatalogRepository = $vegetableTypeCatalogRepo;
    }

    /**
     * Display a listing of the VegetableTypeCatalog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vegetableTypeCatalogRepository->pushCriteria(new RequestCriteria($request));
        $vegetableTypeCatalogs = $this->vegetableTypeCatalogRepository->all();

        return view('catalogs.vegetable_type_catalogs.index')
            ->with('vegetableTypeCatalogs', $vegetableTypeCatalogs);
    }

    /**
     * Show the form for creating a new VegetableTypeCatalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogs.vegetable_type_catalogs.create');
    }

    /**
     * Store a newly created VegetableTypeCatalog in storage.
     *
     * @param CreateVegetableTypeCatalogRequest $request
     *
     * @return Response
     */
    public function store(CreateVegetableTypeCatalogRequest $request)
    {
        $input = $request->all();

        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->create($input);

        Flash::success(Lang::get('catalogs/vegetable_type_catalog.success'));

        return redirect(route('catalogs.vegetableTypeCatalogs.index'));
    }

    /**
     * Display the specified VegetableTypeCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_type_catalog.not found'));

            return redirect(route('catalogs.vegetableTypeCatalogs.index'));
        }

        return view('catalogs.vegetable_type_catalogs.show')->with('vegetableTypeCatalog', $vegetableTypeCatalog);
    }

    /**
     * Show the form for editing the specified VegetableTypeCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_type_catalog.not found'));

            return redirect(route('catalogs.vegetableTypeCatalogs.index'));
        }

        return view('catalogs.vegetable_type_catalogs.edit')->with('vegetableTypeCatalog', $vegetableTypeCatalog);
    }

    /**
     * Update the specified VegetableTypeCatalog in storage.
     *
     * @param  int              $id
     * @param UpdateVegetableTypeCatalogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVegetableTypeCatalogRequest $request)
    {
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_type_catalog.not found'));

            return redirect(route('catalogs.vegetableTypeCatalogs.index'));
        }

        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->update($request->all(), $id);

        Flash::success(Lang::get('catalogs/vegetable_type_catalog.update'));

        return redirect(route('catalogs.vegetableTypeCatalogs.index'));
    }

    /**
     * Remove the specified VegetableTypeCatalog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vegetableTypeCatalog = $this->vegetableTypeCatalogRepository->findWithoutFail($id);

        if (empty($vegetableTypeCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_type_catalog.not found'));

            return redirect(route('catalogs.vegetableTypeCatalogs.index'));
        }

        $this->vegetableTypeCatalogRepository->delete($id);

        Flash::success(Lang::get('catalogs/vegetable_type_catalog.delete'));

        return redirect(route('catalogs.vegetableTypeCatalogs.index'));
    }
}
