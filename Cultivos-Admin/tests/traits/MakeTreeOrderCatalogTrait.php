<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\TreeOrderCatalog;
use App\Repositories\Catalogs\TreeOrderCatalogRepository;

trait MakeTreeOrderCatalogTrait
{
    /**
     * Create fake instance of TreeOrderCatalog and save it in database
     *
     * @param array $treeOrderCatalogFields
     * @return TreeOrderCatalog
     */
    public function makeTreeOrderCatalog($treeOrderCatalogFields = [])
    {
        /** @var TreeOrderCatalogRepository $treeOrderCatalogRepo */
        $treeOrderCatalogRepo = App::make(TreeOrderCatalogRepository::class);
        $theme = $this->fakeTreeOrderCatalogData($treeOrderCatalogFields);
        return $treeOrderCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of TreeOrderCatalog
     *
     * @param array $treeOrderCatalogFields
     * @return TreeOrderCatalog
     */
    public function fakeTreeOrderCatalog($treeOrderCatalogFields = [])
    {
        return new TreeOrderCatalog($this->fakeTreeOrderCatalogData($treeOrderCatalogFields));
    }

    /**
     * Get fake data of TreeOrderCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTreeOrderCatalogData($treeOrderCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'IdFamily' => $fake->randomDigitNotNull,
            'Name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $treeOrderCatalogFields);
    }
}
