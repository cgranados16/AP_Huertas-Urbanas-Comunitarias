<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Requests\Catalogs\CreateVegetablePropertiesCatalogRequest;
use App\Http\Requests\Catalogs\UpdateVegetablePropertiesCatalogRequest;
use App\Repositories\Catalogs\VegetablePropertiesCatalogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lang;

class VegetablePropertiesCatalogController extends AppBaseController
{
    /** @var  VegetablePropertiesCatalogRepository */
    private $vegetablePropertiesCatalogRepository;

    public function __construct(VegetablePropertiesCatalogRepository $vegetablePropertiesCatalogRepo)
    {
        $this->middleware('auth');
        $this->vegetablePropertiesCatalogRepository = $vegetablePropertiesCatalogRepo;
    }

    /**
     * Display a listing of the VegetablePropertiesCatalog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vegetablePropertiesCatalogRepository->pushCriteria(new RequestCriteria($request));
        $vegetablePropertiesCatalogs = $this->vegetablePropertiesCatalogRepository->all();

        return view('catalogs.vegetable_properties_catalogs.index')
            ->with('vegetablePropertiesCatalogs', $vegetablePropertiesCatalogs);
    }

    /**
     * Show the form for creating a new VegetablePropertiesCatalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogs.vegetable_properties_catalogs.create');
    }

    /**
     * Store a newly created VegetablePropertiesCatalog in storage.
     *
     * @param CreateVegetablePropertiesCatalogRequest $request
     *
     * @return Response
     */
    public function store(CreateVegetablePropertiesCatalogRequest $request)
    {
        $input = $request->all();

        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->create($input);
            
        Flash::success(Lang::get('catalogs/vegetable_properties_catalogs.success'));

        return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
    }

    /**
     * Display the specified VegetablePropertiesCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_properties_catalogs.not found'));

            return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
        }

        return view('catalogs.vegetable_properties_catalogs.show')->with('vegetablePropertiesCatalog', $vegetablePropertiesCatalog);
    }

    /**
     * Show the form for editing the specified VegetablePropertiesCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_properties_catalogs.not found'));

            return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
        }

        return view('catalogs.vegetable_properties_catalogs.edit')->with('vegetablePropertiesCatalog', $vegetablePropertiesCatalog);
    }

    /**
     * Update the specified VegetablePropertiesCatalog in storage.
     *
     * @param  int              $id
     * @param UpdateVegetablePropertiesCatalogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVegetablePropertiesCatalogRequest $request)
    {
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_properties_catalogs.not found'));

            return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
        }

        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->update($request->all(), $id);

        Flash::success(Lang::get('catalogs/vegetable_properties_catalogs.update'));

        return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
    }

    /**
     * Remove the specified VegetablePropertiesCatalog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepository->findWithoutFail($id);

        if (empty($vegetablePropertiesCatalog)) {
            Flash::error(Lang::get('catalogs/vegetable_properties_catalogs.not found'));

            return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
        }

        $this->vegetablePropertiesCatalogRepository->delete($id);

        Flash::success(Lang::get('catalogs/vegetable_properties_catalogs.delete'));

        return redirect(route('catalogs.vegetablePropertiesCatalogs.index'));
    }
}
