<?php

namespace spec\App\Infrastructure\Persistence\Recipe;

use App\Infrastructure\Persistence\Recipe\RecipeAPIResults;
use PhpSpec\ObjectBehavior;

class RecipeAPIResultsSpec extends ObjectBehavior
{
    function let()
    {
        $recipeResults = file_get_contents("spec/recipeResults.json");
        $this->beConstructedWith($recipeResults);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(RecipeAPIResults::class);
    }

    function it_can_return_a_random_recipe()
    {
        $this->getRandomRecipe()->shouldHaveType('App\Domain\Recipe\Recipe');
    }
}
