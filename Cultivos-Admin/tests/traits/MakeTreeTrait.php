<?php

use Faker\Factory as Faker;
use App\Models\Tree;
use App\Repositories\TreeRepository;

trait MakeTreeTrait
{
    /**
     * Create fake instance of Tree and save it in database
     *
     * @param array $treeFields
     * @return Tree
     */
    public function makeTree($treeFields = [])
    {
        /** @var TreeRepository $treeRepo */
        $treeRepo = App::make(TreeRepository::class);
        $theme = $this->fakeTreeData($treeFields);
        return $treeRepo->create($theme);
    }

    /**
     * Get fake instance of Tree
     *
     * @param array $treeFields
     * @return Tree
     */
    public function fakeTree($treeFields = [])
    {
        return new Tree($this->fakeTreeData($treeFields));
    }

    /**
     * Get fake data of Tree
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTreeData($treeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Name' => $fake->word,
            'Order' => $fake->randomDigitNotNull,
            'InDanger' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $treeFields);
    }
}
