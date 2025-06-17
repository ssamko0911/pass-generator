<?php declare(strict_types=1);

namespace App\Service\Generator\MultipleCharacter\Impl;

use App\Service\Generator\MultipleCharacter\MultipleRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleNumberRandomCharacterGenerator;

final class MultipleNumberRandomCharacterGenerator extends MultipleRandomCharacterGenerator
{
    public function __construct(SingleNumberRandomCharacterGenerator $generator)
    {
        parent::__construct($generator);
    }
}
