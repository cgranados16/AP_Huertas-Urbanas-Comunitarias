<?php

use App\Models\Catalogs\TreeOrderCatalog;
use App\Repositories\Catalogs\TreeOrderCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeOrderCatalogRepositoryTest extends TestCase
{
    use MakeTreeOrderCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TreeOrderCatalogRepository
     */
    protected $treeOrderCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->treeOrderCatalogRepo = App::make(TreeOrderCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->fakeTreeOrderCatalogData();
        $createdTreeOrderCatalog = $this->treeOrderCatalogRepo->create($treeOrderCatalog);
        $createdTreeOrderCatalog = $createdTreeOrderCatalog->toArray();
        $this->assertArrayHasKey('id', $createdTreeOrderCatalog);
        $this->assertNotNull($createdTreeOrderCatalog['id'], 'Created TreeOrderCatalog must have id specified');
        $this->assertNotNull(TreeOrderCatalog::find($createdTreeOrderCatalog['id']), 'TreeOrderCatalog with given id must be in DB');
        $this->assertModelData($treeOrderCatalog, $createdTreeOrderCatalog);
    }

    /**
     * @test read
     */
    public function testReadTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $dbTreeOrderCatalog = $this->treeOrderCatalogRepo->find($treeOrderCatalog->id);
        $dbTreeOrderCatalog = $dbTreeOrderCatalog->toArray();
        $this->assertModelData($treeOrderCatalog->toArray(), $dbTreeOrderCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $fakeTreeOrderCatalog = $this->fakeTreeOrderCatalogData();
        $updatedTreeOrderCatalog = $this->treeOrderCatalogRepo->update($fakeTreeOrderCatalog, $treeOrderCatalog->id);
        $this->assertModelData($fakeTreeOrderCatalog, $updatedTreeOrderCatalog->toArray());
        $dbTreeOrderCatalog = $this->treeOrderCatalogRepo->find($treeOrderCatalog->id);
        $this->assertModelData($fakeTreeOrderCatalog, $dbTreeOrderCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $resp = $this->treeOrderCatalogRepo->delete($treeOrderCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(TreeOrderCatalog::find($treeOrderCatalog->id), 'TreeOrderCatalog should not exist in DB');
    }
}
