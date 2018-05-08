<?php

use Faker\Factory as Faker;
use App\Models\Catalogs\ColorCatalog;
use App\Repositories\Catalogs\ColorCatalogRepository;

trait MakeColorCatalogTrait
{
    /**
     * Create fake instance of ColorCatalog and save it in database
     *
     * @param array $colorCatalogFields
     * @return ColorCatalog
     */
    public function makeColorCatalog($colorCatalogFields = [])
    {
        /** @var ColorCatalogRepository $colorCatalogRepo */
        $colorCatalogRepo = App::make(ColorCatalogRepository::class);
        $theme = $this->fakeColorCatalogData($colorCatalogFields);
        return $colorCatalogRepo->create($theme);
    }

    /**
     * Get fake instance of ColorCatalog
     *
     * @param array $colorCatalogFields
     * @return ColorCatalog
     */
    public function fakeColorCatalog($colorCatalogFields = [])
    {
        return new ColorCatalog($this->fakeColorCatalogData($colorCatalogFields));
    }

    /**
     * Get fake data of ColorCatalog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeColorCatalogData($colorCatalogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Description' => $fake->text,
            'ColorHexCode' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $colorCatalogFields);
    }
}
