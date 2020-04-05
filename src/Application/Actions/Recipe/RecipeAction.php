<?php
declare(strict_types=1);

namespace App\Application\Actions\Recipe;

use App\Application\Actions\Action;
use App\Domain\Recipe\iRecipeRepository;
use Psr\Log\LoggerInterface;

abstract class RecipeAction extends Action
{
    /**
     * @var RecipeRepository
     */
    protected $recipeRepository;

    /**
     * @param LoggerInterface $logger
     * @param iRecipeRepository  $iRecipeRepository
     */
    public function __construct(LoggerInterface $logger, iRecipeRepository $recipeRepository)
    {
        parent::__construct($logger);
        $this->recipeRepository = $recipeRepository;
    }
}
