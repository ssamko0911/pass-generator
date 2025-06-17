<?php declare(strict_types=1);

namespace App\Service\Generator\MultipleCharacter\Impl;

use App\Service\Generator\MultipleCharacter\MultipleRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleUppercaseRandomCharacterGenerator;

final class MultipleUppercaseRandomCharacterGenerator extends MultipleRandomCharacterGenerator
{
    public function __construct(SingleUppercaseRandomCharacterGenerator $generator)
    {
        parent::__construct($generator);
    }
}
