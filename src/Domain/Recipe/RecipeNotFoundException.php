<?php
declare(strict_types=1);

namespace App\Domain\Recipe;

use App\Domain\DomainException\DomainRecordNotFoundException;

class RecipeNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'No matching recipes could be found.';
}
