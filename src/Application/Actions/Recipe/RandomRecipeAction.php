<?php
declare(strict_types=1);

namespace App\Application\Actions\Recipe;

use Psr\Http\Message\ResponseInterface as Response;

class RandomRecipeAction extends RecipeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $search = (string) $this->resolveArg('search');
        $recipe = $this->recipeRepository->findRandomWithSearch($search);
        
        return $this->respondWithData($recipe);
    }
}
