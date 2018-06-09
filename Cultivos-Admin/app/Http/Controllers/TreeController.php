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
        Flash::success(Lang::get('/trees.success'));
        $files = $request->file('file');
        $this->storePhotos($tree->id,$files);
        
    }

    
    public function storePhotos($id, $files)
    {
        $time = Carbon::now();
        if ($files){
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();    
                $directory = 'trees/'. $id;
                $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
                $upload_success = $file->storeAs($directory, $filename,'photos');
                $ext_upload_success = $file->storeAs($directory, $filename,'ext_photos');
                if ($upload_success && $ext_upload_success) {
                   $photo = new PhotosPerTree();
                   $photo->IdTree = $id;
                   $photo->Photo = 'photos/trees/'. $id.'/'.$filename;
                   $photo->save();
                }
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
        $ordersCatalog = DB::table('treeordercatalog')->get();
        return view('trees.edit')->with('tree', $tree)->with('ordersCatalog',$ordersCatalog);
    }

    /**
     * Update the specified Tree in storage.
     *
     * @param  int              $id
     * @param UpdateTreeRequest $request
     *
     * @return Response
     */
    public function update($id)
    {   
        $tree = Tree::find($id);
        $tree->Name = Input::get('Name');
        $tree->Order = Input::get('Order');
        $tree->InDanger = Input::get('InDanger');
        $tree->save();

        $files = Input::file('file');
        $this->storePhotos($tree->id,$files);

        Flash::success(Lang::get('/trees.update'));

        return redirect(route('trees.index'));
    }

    public function destroyPhoto()
    {
        $id = Input::get('id');
        PhotosPerTree::destroy($id);
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
        $photos = Tree::find($id);
        $photos = $photos->photos;
        if ($photos){
            foreach ($photos as $photo) {
               $photo->delete();
            }
        }
        $this->treeRepository->delete($id);
        

        Flash::success(Lang::get('/trees.success'));

        return redirect(route('trees.index'));
    }


}
