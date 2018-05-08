<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VegetableTypeCatalogApiTest extends TestCase
{
    use MakeVegetableTypeCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->fakeVegetableTypeCatalogData();
        $this->json('POST', '/api/v1/vegetableTypeCatalogs', $vegetableTypeCatalog);

        $this->assertApiResponse($vegetableTypeCatalog);
    }

    /**
     * @test
     */
    public function testReadVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $this->json('GET', '/api/v1/vegetableTypeCatalogs/'.$vegetableTypeCatalog->id);

        $this->assertApiResponse($vegetableTypeCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $editedVegetableTypeCatalog = $this->fakeVegetableTypeCatalogData();

        $this->json('PUT', '/api/v1/vegetableTypeCatalogs/'.$vegetableTypeCatalog->id, $editedVegetableTypeCatalog);

        $this->assertApiResponse($editedVegetableTypeCatalog);
    }

    /**
     * @test
     */
    public function testDeleteVegetableTypeCatalog()
    {
        $vegetableTypeCatalog = $this->makeVegetableTypeCatalog();
        $this->json('DELETE', '/api/v1/vegetableTypeCatalogs/'.$vegetableTypeCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vegetableTypeCatalogs/'.$vegetableTypeCatalog->id);

        $this->assertResponseStatus(404);
    }
}
