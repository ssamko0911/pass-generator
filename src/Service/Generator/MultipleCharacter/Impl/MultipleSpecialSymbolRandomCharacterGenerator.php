<?php declare(strict_types=1);

namespace App\Service\Generator\MultipleCharacter\Impl;

use App\Service\Generator\MultipleCharacter\MultipleRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleSpecialSymbolRandomCharacterGenerator;

final class MultipleSpecialSymbolRandomCharacterGenerator extends MultipleRandomCharacterGenerator
{
    public function __construct(SingleSpecialSymbolRandomCharacterGenerator $generator)
    {
        parent::__construct($generator);
    }
}
