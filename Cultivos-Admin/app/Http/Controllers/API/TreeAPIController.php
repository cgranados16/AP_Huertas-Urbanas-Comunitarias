<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTreeAPIRequest;
use App\Http\Requests\API\UpdateTreeAPIRequest;
use App\Models\Tree;
use App\Repositories\TreeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TreeController
 * @package App\Http\Controllers\API
 */

class TreeAPIController extends AppBaseController
{
    /** @var  TreeRepository */
    private $treeRepository;

    public function __construct(TreeRepository $treeRepo)
    {
        $this->treeRepository = $treeRepo;
    }

    /**
     * Display a listing of the Tree.
     * GET|HEAD /trees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->treeRepository->pushCriteria(new RequestCriteria($request));
        $this->treeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $trees = $this->treeRepository->all();

        return $this->sendResponse($trees->toArray(), 'Trees retrieved successfully');
    }

    /**
     * Store a newly created Tree in storage.
     * POST /trees
     *
     * @param CreateTreeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTreeAPIRequest $request)
    {
        $input = $request->all();

        $trees = $this->treeRepository->create($input);

        return $this->sendResponse($trees->toArray(), 'Tree saved successfully');
    }

    /**
     * Display the specified Tree.
     * GET|HEAD /trees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tree $tree */
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            return $this->sendError('Tree not found');
        }

        return $this->sendResponse($tree->toArray(), 'Tree retrieved successfully');
    }

    /**
     * Update the specified Tree in storage.
     * PUT/PATCH /trees/{id}
     *
     * @param  int $id
     * @param UpdateTreeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTreeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tree $tree */
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            return $this->sendError('Tree not found');
        }

        $tree = $this->treeRepository->update($input, $id);

        return $this->sendResponse($tree->toArray(), 'Tree updated successfully');
    }

    /**
     * Remove the specified Tree from storage.
     * DELETE /trees/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tree $tree */
        $tree = $this->treeRepository->findWithoutFail($id);

        if (empty($tree)) {
            return $this->sendError('Tree not found');
        }

        $tree->delete();

        return $this->sendResponse($id, 'Tree deleted successfully');
    }
}
