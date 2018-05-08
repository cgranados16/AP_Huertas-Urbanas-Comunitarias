<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeFamilyCatalogApiTest extends TestCase
{
    use MakeTreeFamilyCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->fakeTreeFamilyCatalogData();
        $this->json('POST', '/api/v1/treeFamilyCatalogs', $treeFamilyCatalog);

        $this->assertApiResponse($treeFamilyCatalog);
    }

    /**
     * @test
     */
    public function testReadTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $this->json('GET', '/api/v1/treeFamilyCatalogs/'.$treeFamilyCatalog->id);

        $this->assertApiResponse($treeFamilyCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $editedTreeFamilyCatalog = $this->fakeTreeFamilyCatalogData();

        $this->json('PUT', '/api/v1/treeFamilyCatalogs/'.$treeFamilyCatalog->id, $editedTreeFamilyCatalog);

        $this->assertApiResponse($editedTreeFamilyCatalog);
    }

    /**
     * @test
     */
    public function testDeleteTreeFamilyCatalog()
    {
        $treeFamilyCatalog = $this->makeTreeFamilyCatalog();
        $this->json('DELETE', '/api/v1/treeFamilyCatalogs/'.$treeFamilyCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/treeFamilyCatalogs/'.$treeFamilyCatalog->id);

        $this->assertResponseStatus(404);
    }
}
