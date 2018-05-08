<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\TreeFamilyCatalog;
use App\Repositories\Catalogs\TreeFamilyCatalogRepository;

trait MakeTreeFamilyCatalogTrait
{
    /**
     * Create fake instance of TreeFamilyCatalog and save it in database
     *
     * @param array $treeFamilyCatalogFields
     * @return TreeFamilyCatalog
     */
    public function makeTreeFamilyCatalog($treeFamilyCatalogFields = [])
    {
        /** @var TreeFamilyCatalogRepository $treeFamilyCatalogRepo */
        $treeFamilyCatalogRepo = App::make(TreeFamilyCatalogRepository::class);
        $theme = $this->fakeTreeFamilyCatalogData($treeFamilyCatalogFields);
        return $treeFamilyCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of TreeFamilyCatalog
     *
     * @param array $treeFamilyCatalogFields
     * @return TreeFamilyCatalog
     */
    public function fakeTreeFamilyCatalog($treeFamilyCatalogFields = [])
    {
        return new TreeFamilyCatalog($this->fakeTreeFamilyCatalogData($treeFamilyCatalogFields));
    }

    /**
     * Get fake data of TreeFamilyCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTreeFamilyCatalogData($treeFamilyCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $treeFamilyCatalogFields);
    }
}
