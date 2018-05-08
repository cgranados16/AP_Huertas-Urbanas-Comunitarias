<?php

use App\Models\Tree;
use App\Repositories\TreeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeRepositoryTest extends TestCase
{
    use MakeTreeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TreeRepository
     */
    protected $treeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->treeRepo = App::make(TreeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTree()
    {
        $tree = $this->fakeTreeData();
        $createdTree = $this->treeRepo->create($tree);
        $createdTree = $createdTree->toArray();
        $this->assertArrayHasKey('id', $createdTree);
        $this->assertNotNull($createdTree['id'], 'Created Tree must have id specified');
        $this->assertNotNull(Tree::find($createdTree['id']), 'Tree with given id must be in DB');
        $this->assertModelData($tree, $createdTree);
    }

    /**
     * @test read
     */
    public function testReadTree()
    {
        $tree = $this->makeTree();
        $dbTree = $this->treeRepo->find($tree->id);
        $dbTree = $dbTree->toArray();
        $this->assertModelData($tree->toArray(), $dbTree);
    }

    /**
     * @test update
     */
    public function testUpdateTree()
    {
        $tree = $this->makeTree();
        $fakeTree = $this->fakeTreeData();
        $updatedTree = $this->treeRepo->update($fakeTree, $tree->id);
        $this->assertModelData($fakeTree, $updatedTree->toArray());
        $dbTree = $this->treeRepo->find($tree->id);
        $this->assertModelData($fakeTree, $dbTree->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTree()
    {
        $tree = $this->makeTree();
        $resp = $this->treeRepo->delete($tree->id);
        $this->assertTrue($resp);
        $this->assertNull(Tree::find($tree->id), 'Tree should not exist in DB');
    }
}
