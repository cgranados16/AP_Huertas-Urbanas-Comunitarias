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
use Carbon\Carbon;
use App\Models\Catalogs\ColorCatalog;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Models\Catalogs\VegetablePropertiesCatalog;
use DataTables;
use Illuminate\Support\Facades\Input;
use App\Models\Vegetable;
use App\Models\PhotosPerVegetable;

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
    public function store()
    {
        $vegetable = new Vegetable();
        $vegetable->Name = Input::get('Name');
        $vegetable->Color = Input::get('Color');
        $vegetable->Type = Input::get('Type');
        $vegetable->save();
        $properties = Input::get('properties');  
        $vegetable->properties()->attach($properties);
        
        $files = Input::file('file');
        if ($files){
            $this->storePhotos($vegetable->id,$files);
        }
        Flash::success(Lang::get('/vegetables.success'));
        return redirect(route('vegetables.index'));
    }

    public function storePhotos($id, $files)
    {
        $time = Carbon::now();
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();    
            $directory = 'vegetables/'. $id;
            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
            $upload_success = $file->storeAs($directory, $filename,'photos');
            $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
            if ($upload_success && $ext_upload_success) {
                $photo = new PhotosPerVegetable();
                $photo->IdVegetable = $id;
                $photo->Photo = 'photos/vegetables/'. $id.'/'.$filename;
                $photo->save();
            }
        }
    
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
        $vegetable = Vegetable::find($id);
        $vegetable->Name = Input::get('Name');
        $vegetable->Color = Input::get('Color');
        $vegetable->Type = Input::get('Type');
        $vegetable->save();
        $properties = Input::get('properties');  
        $vegetable->properties()->attach($properties);
        
        $files = Input::file('file');

        if ($files){
            $this->storePhotos($vegetable->id,$files);
        }

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
        $vegetable->properties()->detach();
        $photos = Vegetable::find($id);
        $photos = $photos->photos;
        if ($photos){
            foreach ($photos as $photo) {
               $photo->delete();
            }
        }
        $this->vegetableRepository->delete($id);

        Flash::success(Lang::get('/vegetables.success'));

        return redirect(route('vegetables.index'));
    }

    public function destroyPhoto()
    {
        $id = Input::get('id');
        PhotosPerVegetable::destroy($id);
    }

}
