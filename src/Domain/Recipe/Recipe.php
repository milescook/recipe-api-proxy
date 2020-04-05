<?php
declare(strict_types=1);

namespace App\Domain\Recipe;

use JsonSerializable;

class Recipe implements JsonSerializable
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var array<string> $ingredientLines
     */
    private $ingredientLines;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var string $image An image url
     */
    private $image;

    /**
     * @param string    $label
     * @param array<string> $ingredientLines
     * @param string    $url
     * @param string    $image
     */
    public function __construct(string $label, array $ingredientLines, string $url, string $image)
    {
        $this->label = $label;
        $this->ingredientLines = $ingredientLines;
        $this->url = ucfirst($url);
        $this->image = ucfirst($image);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'label' => $this->label,
            'ingredientLines' => implode(', ',$this->ingredientLines),
            'url' => $this->url,
            'image' => $this->image,
        ];
    }
}
