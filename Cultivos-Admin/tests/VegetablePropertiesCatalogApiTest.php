<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VegetablePropertiesCatalogApiTest extends TestCase
{
    use MakeVegetablePropertiesCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->fakeVegetablePropertiesCatalogData();
        $this->json('POST', '/api/v1/vegetablePropertiesCatalogs', $vegetablePropertiesCatalog);

        $this->assertApiResponse($vegetablePropertiesCatalog);
    }

    /**
     * @test
     */
    public function testReadVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $this->json('GET', '/api/v1/vegetablePropertiesCatalogs/'.$vegetablePropertiesCatalog->id);

        $this->assertApiResponse($vegetablePropertiesCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $editedVegetablePropertiesCatalog = $this->fakeVegetablePropertiesCatalogData();

        $this->json('PUT', '/api/v1/vegetablePropertiesCatalogs/'.$vegetablePropertiesCatalog->id, $editedVegetablePropertiesCatalog);

        $this->assertApiResponse($editedVegetablePropertiesCatalog);
    }

    /**
     * @test
     */
    public function testDeleteVegetablePropertiesCatalog()
    {
        $vegetablePropertiesCatalog = $this->makeVegetablePropertiesCatalog();
        $this->json('DELETE', '/api/v1/vegetablePropertiesCatalogs/'.$vegetablePropertiesCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vegetablePropertiesCatalogs/'.$vegetablePropertiesCatalog->id);

        $this->assertResponseStatus(404);
    }
}
