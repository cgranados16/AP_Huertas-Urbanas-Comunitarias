<?php

use App\Models\Catalogs\ColorCatalog;
use App\Repositories\Catalogs\ColorCatalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ColorCatalogRepositoryTest extends TestCase
{
    use MakeColorCatalogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ColorCatalogRepository
     */
    protected $colorCatalogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->colorCatalogRepo = App::make(ColorCatalogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateColorCatalog()
    {
        $colorCatalog = $this->fakeColorCatalogData();
        $createdColorCatalog = $this->colorCatalogRepo->create($colorCatalog);
        $createdColorCatalog = $createdColorCatalog->toArray();
        $this->assertArrayHasKey('id', $createdColorCatalog);
        $this->assertNotNull($createdColorCatalog['id'], 'Created ColorCatalog must have id specified');
        $this->assertNotNull(ColorCatalog::find($createdColorCatalog['id']), 'ColorCatalog with given id must be in DB');
        $this->assertModelData($colorCatalog, $createdColorCatalog);
    }

    /**
     * @test read
     */
    public function testReadColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $dbColorCatalog = $this->colorCatalogRepo->find($colorCatalog->id);
        $dbColorCatalog = $dbColorCatalog->toArray();
        $this->assertModelData($colorCatalog->toArray(), $dbColorCatalog);
    }

    /**
     * @test update
     */
    public function testUpdateColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $fakeColorCatalog = $this->fakeColorCatalogData();
        $updatedColorCatalog = $this->colorCatalogRepo->update($fakeColorCatalog, $colorCatalog->id);
        $this->assertModelData($fakeColorCatalog, $updatedColorCatalog->toArray());
        $dbColorCatalog = $this->colorCatalogRepo->find($colorCatalog->id);
        $this->assertModelData($fakeColorCatalog, $dbColorCatalog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $resp = $this->colorCatalogRepo->delete($colorCatalog->id);
        $this->assertTrue($resp);
        $this->assertNull(ColorCatalog::find($colorCatalog->id), 'ColorCatalog should not exist in DB');
    }
}
