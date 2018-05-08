<?php

use App\Models\Catalogs\VegetableTypeCatalog;
use App\Repositories\Catalogs\VegetableTypeCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VegetableTypeCatalogRepositoryTest extends TestCase
{
    use MakeVegetableTypeCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VegetableTypeCatalogRepository
     */
    protected $vegetableTypeCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vegetableTypeCatalogRepo = App::make(VegetableTypeCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->fakeVegetableTypeCatalogData();
        $createdVegetableTypeCatalog = $this->vegetableTypeCatalogRepo->create($vegetableTypeCatalog);
        $createdVegetableTypeCatalog = $createdVegetableTypeCatalog->toArray();
        $this->assertArrayHasKey('id', $createdVegetableTypeCatalog);
        $this->assertNotNull($createdVegetableTypeCatalog['id'], 'Created VegetableTypeCatalog must have id specified');
        $this->assertNotNull(VegetableTypeCatalog::find($createdVegetableTypeCatalog['id']), 'VegetableTypeCatalog with given id must be in DB');
        $this->assertModelData($vegetableTypeCatalog, $createdVegetableTypeCatalog);
    }

    /**
     * @test read
     */
    public function testReadVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $dbVegetableTypeCatalog = $this->vegetableTypeCatalogRepo->find($vegetableTypeCatalog->id);
        $dbVegetableTypeCatalog = $dbVegetableTypeCatalog->toArray();
        $this->assertModelData($vegetableTypeCatalog->toArray(), $dbVegetableTypeCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $fakeVegetableTypeCatalog = $this->fakeVegetableTypeCatalogData();
        $updatedVegetableTypeCatalog = $this->vegetableTypeCatalogRepo->update($fakeVegetableTypeCatalog, $vegetableTypeCatalog->id);
        $this->assertModelData($fakeVegetableTypeCatalog, $updatedVegetableTypeCatalog->toArray());
        $dbVegetableTypeCatalog = $this->vegetableTypeCatalogRepo->find($vegetableTypeCatalog->id);
        $this->assertModelData($fakeVegetableTypeCatalog, $dbVegetableTypeCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $resp = $this->vegetableTypeCatalogRepo->delete($vegetableTypeCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(VegetableTypeCatalog::find($vegetableTypeCatalog->id), 'VegetableTypeCatalog should not exist in DB');
    }
}
