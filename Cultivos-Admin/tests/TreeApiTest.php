<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TreeApiTest extends TestCase
{
    use MakeTreeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTree()
    {
        $tree = $this->fakeTreeData();
        $this->json('POST', '/api/v1/trees', $tree);

        $this->assertApiResponse($tree);
    }

    /**
     * @test
     */
    public function testReadTree()
    {
        $tree = $this->makeTree();
        $this->json('GET', '/api/v1/trees/'.$tree->id);

        $this->assertApiResponse($tree->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTree()
    {
        $tree = $this->makeTree();
        $editedTree = $this->fakeTreeData();

        $this->json('PUT', '/api/v1/trees/'.$tree->id, $editedTree);

        $this->assertApiResponse($editedTree);
    }

    /**
     * @test
     */
    public function testDeleteTree()
    {
        $tree = $this->makeTree();
        $this->json('DELETE', '/api/v1/trees/'.$tree->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/trees/'.$tree->id);

        $this->assertResponseStatus(404);
    }
}
