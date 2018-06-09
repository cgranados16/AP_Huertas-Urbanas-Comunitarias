<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Requests\Catalogs\CreateFertilizerCatalogRequest;
use App\Http\Requests\Catalogs\UpdateFertilizerCatalogRequest;
use App\Repositories\Catalogs\FertilizerCatalogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lang;

class FertilizerCatalogController extends AppBaseController
{
    /** @var  FertilizerCatalogRepository */
    private $fertilizerCatalogRepository;

    public function __construct(FertilizerCatalogRepository $fertilizerCatalogRepo)
    {
        $this->middleware('auth');
        $this->fertilizerCatalogRepository = $fertilizerCatalogRepo;
    }

    /**
     * Display a listing of the FertilizerCatalog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fertilizerCatalogRepository->pushCriteria(new RequestCriteria($request));
        $fertilizerCatalogs = $this->fertilizerCatalogRepository->all();

        return view('catalogs.fertilizer_catalogs.index')
            ->with('fertilizerCatalogs', $fertilizerCatalogs);
    }

    /**
     * Show the form for creating a new FertilizerCatalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogs.fertilizer_catalogs.create');
    }

    /**
     * Store a newly created FertilizerCatalog in storage.
     *
     * @param CreateFertilizerCatalogRequest $request
     *
     * @return Response
     */
    public function store(CreateFertilizerCatalogRequest $request)
    {
        $input = $request->all();

        $fertilizerCatalog = $this->fertilizerCatalogRepository->create($input);
            
        Flash::success(Lang::get('catalogs/fertilizer_catalogs.success'));

        return redirect(route('catalogs.fertilizerCatalogs.index'));
    }

    /**
     * Display the specified FertilizerCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            Flash::error(Lang::get('catalogs/fertilizer_catalogs.not found'));

            return redirect(route('catalogs.fertilizerCatalogs.index'));
        }

        return view('catalogs.fertilizer_catalogs.show')->with('fertilizerCatalog', $fertilizerCatalog);
    }

    /**
     * Show the form for editing the specified FertilizerCatalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            Flash::error(Lang::get('catalogs/fertilizer_catalogs.not found'));

            return redirect(route('catalogs.fertilizerCatalogs.index'));
        }

        return view('catalogs.fertilizer_catalogs.edit')->with('fertilizerCatalog', $fertilizerCatalog);
    }

    /**
     * Update the specified FertilizerCatalog in storage.
     *
     * @param  int              $id
     * @param UpdateFertilizerCatalogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFertilizerCatalogRequest $request)
    {
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            Flash::error(Lang::get('catalogs/fertilizer_catalogs.not found'));

            return redirect(route('catalogs.fertilizerCatalogs.index'));
        }

        $fertilizerCatalog = $this->fertilizerCatalogRepository->update($request->all(), $id);

        Flash::success(Lang::get('catalogs/fertilizer_catalogs.update'));

        return redirect(route('catalogs.fertilizerCatalogs.index'));
    }

    /**
     * Remove the specified FertilizerCatalog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fertilizerCatalog = $this->fertilizerCatalogRepository->findWithoutFail($id);

        if (empty($fertilizerCatalog)) {
            Flash::error(Lang::get('catalogs/fertilizer_catalogs.not found'));

            return redirect(route('catalogs.fertilizerCatalogs.index'));
        }

        $this->fertilizerCatalogRepository->delete($id);

        Flash::success(Lang::get('catalogs/fertilizer_catalogs.success'));

        return redirect(route('catalogs.fertilizerCatalogs.index'));
    }
}
