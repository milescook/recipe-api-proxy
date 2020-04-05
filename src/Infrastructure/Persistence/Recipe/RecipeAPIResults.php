<?php

namespace App\Infrastructure\Persistence\Recipe;

use App\Domain\Recipe\Recipe;

class RecipeAPIResults
{
    /**
     * @var array<Recipe> $_recipeList
     */
    private $_recipeList;

    public function __construct(string $response)
    {
        $object = json_decode($response);
        foreach($object->hits as $thisRecipeResponse)
        {
            $this->_recipeList[] = $this->generateRecipeFromResponse($thisRecipeResponse->recipe);
        }
    }

    function generateRecipeFromResponse(\stdClass $responseObject)
    {
        return new Recipe(
            $responseObject->label,
            $responseObject->ingredientLines,
            $responseObject->url,
            $responseObject->image);
    }

    public function getRandomRecipe()
    {
        $randomIndex = rand(0,9);
        return $this->_recipeList[$randomIndex];
    }
}
