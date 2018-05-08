<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\VegetablePropertiesCatalog;
use App\Repositories\Catalogs\VegetablePropertiesCatalogRepository;

trait MakeVegetablePropertiesCatalogTrait
{
    /**
     * Create fake instance of VegetablePropertiesCatalog and save it in database
     *
     * @param array $vegetablePropertiesCatalogFields
     * @return VegetablePropertiesCatalog
     */
    public function makeVegetablePropertiesCatalog($vegetablePropertiesCatalogFields = [])
    {
        /** @var VegetablePropertiesCatalogRepository $vegetablePropertiesCatalogRepo */
        $vegetablePropertiesCatalogRepo = App::make(VegetablePropertiesCatalogRepository::class);
        $theme = $this->fakeVegetablePropertiesCatalogData($vegetablePropertiesCatalogFields);
        return $vegetablePropertiesCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of VegetablePropertiesCatalog
     *
     * @param array $vegetablePropertiesCatalogFields
     * @return VegetablePropertiesCatalog
     */
    public function fakeVegetablePropertiesCatalog($vegetablePropertiesCatalogFields = [])
    {
        return new VegetablePropertiesCatalog($this->fakeVegetablePropertiesCatalogData($vegetablePropertiesCatalogFields));
    }

    /**
     * Get fake data of VegetablePropertiesCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVegetablePropertiesCatalogData($vegetablePropertiesCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $vegetablePropertiesCatalogFields);
    }
}
