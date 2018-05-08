<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\FertilizerCatalog;
use App\Repositories\Catalogs\FertilizerCatalogRepository;

trait MakeFertilizerCatalogTrait
{
    /**
     * Create fake instance of FertilizerCatalog and save it in database
     *
     * @param array $fertilizerCatalogFields
     * @return FertilizerCatalog
     */
    public function makeFertilizerCatalog($fertilizerCatalogFields = [])
    {
        /** @var FertilizerCatalogRepository $fertilizerCatalogRepo */
        $fertilizerCatalogRepo = App::make(FertilizerCatalogRepository::class);
        $theme = $this->fakeFertilizerCatalogData($fertilizerCatalogFields);
        return $fertilizerCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of FertilizerCatalog
     *
     * @param array $fertilizerCatalogFields
     * @return FertilizerCatalog
     */
    public function fakeFertilizerCatalog($fertilizerCatalogFields = [])
    {
        return new FertilizerCatalog($this->fakeFertilizerCatalogData($fertilizerCatalogFields));
    }

    /**
     * Get fake data of FertilizerCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeFertilizerCatalogData($fertilizerCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Description' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $fertilizerCatalogFields);
    }
}
