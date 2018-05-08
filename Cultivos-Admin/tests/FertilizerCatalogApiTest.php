<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FertilizerCatalogApiTest extends TestCase
{
    use MakeFertilizerCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFertilizerCatalog()
    {
        $fertilizerCatalog = $this->fakeFertilizerCatalogData();
        $this->json('POST', '/api/v1/fertilizerCatalogs', $fertilizerCatalog);

        $this->assertApiResponse($fertilizerCatalog);
    }

    /**
     * @test
     */
    public function testReadFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $this->json('GET', '/api/v1/fertilizerCatalogs/'.$fertilizerCatalog->id);

        $this->assertApiResponse($fertilizerCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $editedFertilizerCatalog = $this->fakeFertilizerCatalogData();

        $this->json('PUT', '/api/v1/fertilizerCatalogs/'.$fertilizerCatalog->id, $editedFertilizerCatalog);

        $this->assertApiResponse($editedFertilizerCatalog);
    }

    /**
     * @test
     */
    public function testDeleteFertilizerCatalog()
    {
        $fertilizerCatalog = $this->makeFertilizerCatalog();
        $this->json('DELETE', '/api/v1/fertilizerCatalogs/'.$fertilizerCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/fertilizerCatalogs/'.$fertilizerCatalog->id);

        $this->assertResponseStatus(404);
    }
}
