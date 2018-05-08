<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\VegetableTypeCatalog;
use App\Repositories\Catalogs\VegetableTypeCatalogRepository;

trait MakeVegetableTypeCatalogTrait
{
    /**
     * Create fake instance of VegetableTypeCatalog and save it in database
     *
     * @param array $vegetableTypeCatalogFields
     * @return VegetableTypeCatalog
     */
    public function makeVegetableTypeCatalog($vegetableTypeCatalogFields = [])
    {
        /** @var VegetableTypeCatalogRepository $vegetableTypeCatalogRepo */
        $vegetableTypeCatalogRepo = App::make(VegetableTypeCatalogRepository::class);
        $theme = $this->fakeVegetableTypeCatalogData($vegetableTypeCatalogFields);
        return $vegetableTypeCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of VegetableTypeCatalog
     *
     * @param array $vegetableTypeCatalogFields
     * @return VegetableTypeCatalog
     */
    public function fakeVegetableTypeCatalog($vegetableTypeCatalogFields = [])
    {
        return new VegetableTypeCatalog($this->fakeVegetableTypeCatalogData($vegetableTypeCatalogFields));
    }

    /**
     * Get fake data of VegetableTypeCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVegetableTypeCatalogData($vegetableTypeCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Description' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $vegetableTypeCatalogFields);
    }
}
