<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Recipe;

use App\Domain\Recipe\Recipe;
use App\Domain\Recipe\RecipeNotFoundException;
use App\Domain\Recipe\iRecipeRepository;
use GuzzleHttp\Client;

class APIRecipeRepository implements iRecipeRepository
{
    /**
     * @var string $appSecret
     */
    private $appSecret;

    /**
     * @var string $appId
     */
    private $appId;

    /**
     * @var string $apiUrl
     */
    private $apiUrl;

    /**
     * APIRecipeRepository constructor.
     */
    public function __construct()
    {
        $this->appId = getenv('RECIPE_PROXY_APP_ID');
        $this->appSecret = getenv('RECIPE_PROXY_APP_SECRET');
        $this->apiUrl = "https://api.edamam.com";
    }

    /**
     * {@inheritdoc}
     */
    public function findRandomWithSearch(string $search): Recipe
    {
        $path = 
        "/search?app_id=" .$this->appId.
        "&app_key=". $this->appSecret .
        "&q=".$search;

        $client = new \GuzzleHttp\Client(['base_uri' => $this->apiUrl]);
        $response = $client->request('GET', $path);
        $responseString = (string) $response->getBody();
        $RecipeAPIResults = new RecipeAPIResults($responseString);

        $Recipe = $RecipeAPIResults->getRandomRecipe();

        return $Recipe;
    }
}
