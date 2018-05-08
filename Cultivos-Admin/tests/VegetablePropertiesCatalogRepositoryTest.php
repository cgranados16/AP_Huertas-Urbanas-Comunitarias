<?php

use App\Models\Catalogs\VegetablePropertiesCatalog;
use App\Repositories\Catalogs\VegetablePropertiesCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VegetablePropertiesCatalogRepositoryTest extends TestCase
{
    use MakeVegetablePropertiesCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VegetablePropertiesCatalogRepository
     */
    protected $vegetablePropertiesCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vegetablePropertiesCatalogRepo = App::make(VegetablePropertiesCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->fakeVegetablePropertiesCatalogData();
        $createdVegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepo->create($vegetablePropertiesCatalog);
        $createdVegetablePropertiesCatalog = $createdVegetablePropertiesCatalog->toArray();
        $this->assertArrayHasKey('id', $createdVegetablePropertiesCatalog);
        $this->assertNotNull($createdVegetablePropertiesCatalog['id'], 'Created VegetablePropertiesCatalog must have id specified');
        $this->assertNotNull(VegetablePropertiesCatalog::find($createdVegetablePropertiesCatalog['id']), 'VegetablePropertiesCatalog with given id must be in DB');
        $this->assertModelData($vegetablePropertiesCatalog, $createdVegetablePropertiesCatalog);
    }

    /**
     * @test read
     */
    public function testReadVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $dbVegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepo->find($vegetablePropertiesCatalog->id);
        $dbVegetablePropertiesCatalog = $dbVegetablePropertiesCatalog->toArray();
        $this->assertModelData($vegetablePropertiesCatalog->toArray(), $dbVegetablePropertiesCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $fakeVegetablePropertiesCatalog = $this->fakeVegetablePropertiesCatalogData();
        $updatedVegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepo->update($fakeVegetablePropertiesCatalog, $vegetablePropertiesCatalog->id);
        $this->assertModelData($fakeVegetablePropertiesCatalog, $updatedVegetablePropertiesCatalog->toArray());
        $dbVegetablePropertiesCatalog = $this->vegetablePropertiesCatalogRepo->find($vegetablePropertiesCatalog->id);
        $this->assertModelData($fakeVegetablePropertiesCatalog, $dbVegetablePropertiesCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $resp = $this->vegetablePropertiesCatalogRepo->delete($vegetablePropertiesCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(VegetablePropertiesCatalog::find($vegetablePropertiesCatalog->id), 'VegetablePropertiesCatalog should not exist in DB');
    }
}
