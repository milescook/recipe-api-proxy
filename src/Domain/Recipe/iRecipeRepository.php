<?php
declare(strict_types=1);

namespace App\Domain\Recipe;

interface iRecipeRepository
{
    
    /**
     * @param string $search
     * @return Recipe
     * @throws RecipeNotFoundException
     */
    public function findRandomWithSearch(string $search): Recipe;
}
