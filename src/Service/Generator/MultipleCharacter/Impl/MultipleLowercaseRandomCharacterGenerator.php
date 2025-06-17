<?php declare(strict_types=1);

namespace App\Service\Generator\MultipleCharacter\Impl;

use App\Service\Generator\MultipleCharacter\MultipleRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleLowercaseRandomCharacterGenerator;

final class MultipleLowercaseRandomCharacterGenerator extends MultipleRandomCharacterGenerator
{
    public function __construct(SingleLowercaseRandomCharacterGenerator $generator)
    {
        parent::__construct($generator);
    }
}
