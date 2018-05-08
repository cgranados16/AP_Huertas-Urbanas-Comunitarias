<?php

use App\Models\Catalogs\FertilizerCatalog;
use App\Repositories\Catalogs\FertilizerCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FertilizerCatalogRepositoryTest extends TestCase
{
    use MakeFertilizerCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FertilizerCatalogRepository
     */
    protected $fertilizerCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->fertilizerCatalogRepo = App::make(FertilizerCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFertilizerCatalog()
    {
        $fertilizerCatalog = $this->fakeFertilizerCatalogData();
        $createdFertilizerCatalog = $this->fertilizerCatalogRepo->create($fertilizerCatalog);
        $createdFertilizerCatalog = $createdFertilizerCatalog->toArray();
        $this->assertArrayHasKey('id', $createdFertilizerCatalog);
        $this->assertNotNull($createdFertilizerCatalog['id'], 'Created FertilizerCatalog must have id specified');
        $this->assertNotNull(FertilizerCatalog::find($createdFertilizerCatalog['id']), 'FertilizerCatalog with given id must be in DB');
        $this->assertModelData($fertilizerCatalog, $createdFertilizerCatalog);
    }

    /**
     * @test read
     */
    public function testReadFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $dbFertilizerCatalog = $this->fertilizerCatalogRepo->find($fertilizerCatalog->id);
        $dbFertilizerCatalog = $dbFertilizerCatalog->toArray();
        $this->assertModelData($fertilizerCatalog->toArray(), $dbFertilizerCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $fakeFertilizerCatalog = $this->fakeFertilizerCatalogData();
        $updatedFertilizerCatalog = $this->fertilizerCatalogRepo->update($fakeFertilizerCatalog, $fertilizerCatalog->id);
        $this->assertModelData($fakeFertilizerCatalog, $updatedFertilizerCatalog->toArray());
        $dbFertilizerCatalog = $this->fertilizerCatalogRepo->find($fertilizerCatalog->id);
        $this->assertModelData($fakeFertilizerCatalog, $dbFertilizerCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $resp = $this->fertilizerCatalogRepo->delete($fertilizerCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(FertilizerCatalog::find($fertilizerCatalog->id), 'FertilizerCatalog should not exist in DB');
    }
}
