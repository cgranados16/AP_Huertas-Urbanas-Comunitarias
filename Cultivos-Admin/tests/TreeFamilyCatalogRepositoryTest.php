<?php

use App\Models\Catalogs\TreeFamilyCatalog;
use App\Repositories\Catalogs\TreeFamilyCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeFamilyCatalogRepositoryTest extends TestCase
{
    use MakeTreeFamilyCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TreeFamilyCatalogRepository
     */
    protected $treeFamilyCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->treeFamilyCatalogRepo = App::make(TreeFamilyCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->fakeTreeFamilyCatalogData();
        $createdTreeFamilyCatalog = $this->treeFamilyCatalogRepo->create($treeFamilyCatalog);
        $createdTreeFamilyCatalog = $createdTreeFamilyCatalog->toArray();
        $this->assertArrayHasKey('id', $createdTreeFamilyCatalog);
        $this->assertNotNull($createdTreeFamilyCatalog['id'], 'Created TreeFamilyCatalog must have id specified');
        $this->assertNotNull(TreeFamilyCatalog::find($createdTreeFamilyCatalog['id']), 'TreeFamilyCatalog with given id must be in DB');
        $this->assertModelData($treeFamilyCatalog, $createdTreeFamilyCatalog);
    }

    /**
     * @test read
     */
    public function testReadTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $dbTreeFamilyCatalog = $this->treeFamilyCatalogRepo->find($treeFamilyCatalog->id);
        $dbTreeFamilyCatalog = $dbTreeFamilyCatalog->toArray();
        $this->assertModelData($treeFamilyCatalog->toArray(), $dbTreeFamilyCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $fakeTreeFamilyCatalog = $this->fakeTreeFamilyCatalogData();
        $updatedTreeFamilyCatalog = $this->treeFamilyCatalogRepo->update($fakeTreeFamilyCatalog, $treeFamilyCatalog->id);
        $this->assertModelData($fakeTreeFamilyCatalog, $updatedTreeFamilyCatalog->toArray());
        $dbTreeFamilyCatalog = $this->treeFamilyCatalogRepo->find($treeFamilyCatalog->id);
        $this->assertModelData($fakeTreeFamilyCatalog, $dbTreeFamilyCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $resp = $this->treeFamilyCatalogRepo->delete($treeFamilyCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(TreeFamilyCatalog::find($treeFamilyCatalog->id), 'TreeFamilyCatalog should not exist in DB');
    }
}
