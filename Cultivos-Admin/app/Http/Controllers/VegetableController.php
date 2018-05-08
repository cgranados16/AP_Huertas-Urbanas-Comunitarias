<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVegetableRequest;
use App\Http\Requests\UpdateVegetableRequest;
use App\Repositories\VegetableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Lang;

use App\Models\Catalogs\ColorCatalog;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Models\Catalogs\VegetablePropertiesCatalog;
use DataTables;
use App\Models\Vegetable;

class VegetableController extends AppBaseController
{
    /** @var  VegetableRepository */
    private $vegetableRepository;

    public function __construct(VegetableRepository $vegetableRepo)
    {
        $this->middleware('auth');
        $this->vegetableRepository = $vegetableRepo;
    }

    /**
     * Display a listing of the Vegetable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vegetableRepository->pushCriteria(new RequestCriteria($request));
        $vegetables = $this->vegetableRepository->all();

        return view('vegetables.index')
            ->with('vegetables', $vegetables);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVegetables()
    {
        $model = Vegetable::with(['color','type']);
        return Datatables::eloquent($model)->toJson();
        
        
    }

    /**
     * Show the form for creating a new Vegetable.
     *
     * @return Response
     */
    public function create()
    {
        $colors = ColorCatalog::all();
        $types = VegetableTypeCatalog::all();
        $properties = VegetablePropertiesCatalog::all();
        return view('vegetables.create')->with(['colors' => $colors,'types' => $types, 'properties' => $properties ]);
    }

    /**
     * Store a newly created Vegetable in storage.
     *
     * @param CreateVegetableRequest $request
     *
     * @return Response
     */
    public function store(CreateVegetableRequest $request)
    {
        $input = $request->all();

        $vegetable = $this->vegetableRepository->create($input);
        Flash::success(Lang::get('/vegetables.success'));

        return redirect(route('vegetables.index'));
    }

    /**
     * Display the specified Vegetable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vegetable = $this->vegetableRepository->findWithoutFail($id);

        if (empty($vegetable)) {
            Flash::error(Lang::get('/vegetables.not found'));

            return redirect(route('vegetables.index'));
        }

        return view('vegetables.show')->with('vegetable', $vegetable);
    }

    /**
     * Show the form for editing the specified Vegetable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vegetable = $this->vegetableRepository->findWithoutFail($id);

        if (empty($vegetable)) {
            Flash::error(Lang::get('/vegetables.not found'));

            return redirect(route('vegetables.index'));
        }
        $colors = ColorCatalog::all();
        $types = VegetableTypeCatalog::all();
        $properties = VegetablePropertiesCatalog::all();
        return view('vegetables.edit')->with('vegetable', $vegetable)->with(['colors' => $colors,'types' => $types, 'properties' => $properties ]);
    }

    /**
     * Update the specified Vegetable in storage.
     *
     * @param  int              $id
     * @param UpdateVegetableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVegetableRequest $request)
    {
        $vegetable = $this->vegetableRepository->findWithoutFail($id);

        if (empty($vegetable)) {
            Flash::error(Lang::get('/vegetables.not found'));

            return redirect(route('vegetables.index'));
        }

        $vegetable = $this->vegetableRepository->update($request->all(), $id);

        Flash::success(Lang::get('/vegetables.update'));

        return redirect(route('vegetables.index'));
    }

    /**
     * Remove the specified Vegetable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vegetable = $this->vegetableRepository->findWithoutFail($id);

        if (empty($vegetable)) {
            Flash::error(Lang::get('/vegetables.not found'));

            return redirect(route('vegetables.index'));
        }

        $this->vegetableRepository->delete($id);

        Flash::success(Lang::get('/vegetables.success'));

        return redirect(route('vegetables.index'));
    }

    public function photos_upload(){

		$input = Input::all();
		$rules = array(
		    'file' => 'image|max:3000',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}

		$file = Input::file('file');

        $extension = File::extension($file['name']);
        $directory = path('public').'uploads/'.sha1(time());
        $filename = sha1(time().time()).".{$extension}";

        $upload_success = Input::upload('file', $directory, $filename);

        if( $upload_success ) {
        	return Response::json('success', 200);
        } else {
        	return Response::json('error', 400);
        }
	}
}
