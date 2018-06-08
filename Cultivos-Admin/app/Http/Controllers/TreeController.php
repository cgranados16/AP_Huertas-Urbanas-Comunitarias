<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTreeRequest;
use App\Http\Requests\UpdateTreeRequest;
use App\Repositories\TreeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Lang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Models\Tree;
use App\Models\PhotosPerTree;

class TreeController extends AppBaseController
{
    /** @var  TreeRepository */
    private $treeRepository;

    public function __construct(TreeRepository $treeRepo)
    {
        $this->middleware('auth');
        $this->treeRepository = $treeRepo;
    }

    /**
     * Display a listing of the Tree.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->treeRepository->pushCriteria(new RequestCriteria($request));
        $trees = $this->treeRepository->all();

        return view('trees.index')
            ->with('trees', $trees);
    }

    /**
     * Show the form for creating a new Tree.
     *
     * @return Response
     */
    public function create()
    {
        $ordersCatalog = DB::table('treeordercatalog')->get();

        return view('trees.create', ['ordersCatalog' => $ordersCatalog]);
    }

    /**
     * Store a newly created Tree in storage.
     *
     * @param CreateTreeRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        

        $tree = new Tree();
        $tree->Name = Input::get('Name');
        $tree->Order = Input::get('Order');
        $tree->InDanger = Input::get('InDanger');
        $tree->save();
        // Flash::success(Lang::get('/trees.success'));

        $time = Carbon::now();
        $files = $request->file('file');
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();    
            $directory = 'trees/'. $tree->id;
            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
            $upload_success = $file->storeAs($directory, $filename,'photos');
            $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
            if ($upload_success && $ext_upload_success) {
               $photo = new PhotosPerTree();
               $photo->IdTree = $tree->id;
               $photo->Photo = 'photos/trees/'. $tree->id.'/'.$filename;
               $photo->save();
            }
        }
    }

    
    public function storePhotos(Request $request)
    {
        $time = Carbon::now();
        $files = $request->file('file');
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();    
            $directory = 'trees/'.Input::get('id');
            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
            $upload_success = $file->storeAs($directory, $filename,'photos');
            $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
            if ($upload_success && $ext_upload_success) {
                return response()->json($upload_success, 200);
            }
        }        
    }

    /**
     * Display the specified Tree.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            Flash::error(Lang::get('/trees.not found'));

            return redirect(route('trees.index'));
        }

        return view('trees.show')->with('tree', $tree);
    }

    /**
     * Show the form for editing the specified Tree.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            Flash::error(Lang::get('/trees.not found'));

            return redirect(route('trees.index'));
        }

        return view('trees.edit')->with('tree', $tree);
    }

    /**
     * Update the specified Tree in storage.
     *
     * @param  int              $id
     * @param UpdateTreeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTreeRequest $request)
    {
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            Flash::error(Lang::get('/trees.not found'));

            return redirect(route('trees.index'));
        }

        $tree = $this->treeRepository->update($request->all(), $id);

        Flash::success(Lang::get('/trees.update'));

        return redirect(route('trees.index'));
    }

    /**
     * Remove the specified Tree from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            Flash::error(Lang::get('/trees.not found'));

            return redirect(route('trees.index'));
        }

        $this->treeRepository->delete($id);

        Flash::success(Lang::get('/trees.success'));

        return redirect(route('trees.index'));
    }


}
