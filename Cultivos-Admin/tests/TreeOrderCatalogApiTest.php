<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeOrderCatalogApiTest extends TestCase
{
    use MakeTreeOrderCatalogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->fakeTreeOrderCatalogData();
        $this->json('POST', '/api/v1/treeOrderCatalogs', $treeOrderCatalog);

        $this->assertApiResponse($treeOrderCatalog);
    }

    /**
     * @test
     */
    public function testReadTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $this->json('GET', '/api/v1/treeOrderCatalogs/'.$treeOrderCatalog->id);

        $this->assertApiResponse($treeOrderCatalog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $editedTreeOrderCatalog = $this->fakeTreeOrderCatalogData();

        $this->json('PUT', '/api/v1/treeOrderCatalogs/'.$treeOrderCatalog->id, $editedTreeOrderCatalog);

        $this->assertApiResponse($editedTreeOrderCatalog);
    }

    /**
     * @test
     */
    public function testDeleteTreeOrderCatalog()
    {
        $treeOrderCatalog = $this->makeTreeOrderCatalog();
        $this->json('DELETE', '/api/v1/treeOrderCatalogs/'.$treeOrderCatalog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/treeOrderCatalogs/'.$treeOrderCatalog->id);

        $this->assertResponseStatus(404);
    }
}
