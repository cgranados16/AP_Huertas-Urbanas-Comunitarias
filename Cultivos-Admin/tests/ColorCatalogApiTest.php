<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ColorCatalogApiTest extends TestCase
{
    use MakeColorCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateColorCatalog()
    {
        $colorCatalog = $this->fakeColorCatalogData();
        $this->json('POST', '/api/v1/colorCatalogs', $colorCatalog);

        $this->assertApiResponse($colorCatalog);
    }

    /**
     * @test
     */
    public function testReadColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $this->json('GET', '/api/v1/colorCatalogs/'.$colorCatalog->id);

        $this->assertApiResponse($colorCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $editedColorCatalog = $this->fakeColorCatalogData();

        $this->json('PUT', '/api/v1/colorCatalogs/'.$colorCatalog->id, $editedColorCatalog);

        $this->assertApiResponse($editedColorCatalog);
    }

    /**
     * @test
     */
    public function testDeleteColorCatalog()
    {
        $colorCatalog = $this->makeColorCatalog();
        $this->json('DELETE', '/api/v1/colorCatalogs/'.$colorCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/colorCatalogs/'.$colorCatalog->id);

        $this->assertResponseStatus(404);
    }
}
