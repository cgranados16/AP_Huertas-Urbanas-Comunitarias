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
        $ordersCatalog = DB::table('treesorder')->get();

        return view('trees.create', ['ordersCatalog' => $ordersCatalog]);
    }

    /**
     * Store a newly created Tree in storage.
     *
     * @param CreateTreeRequest $request
     *
     * @return Response
     */
    public function store(CreateTreeRequest $request)
    {
        $input = $request->all();

        $tree = $this->treeRepository->create($input);
            
        Flash::success(Lang::get('/trees.success'));

        return redirect(route('trees.index'));
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
