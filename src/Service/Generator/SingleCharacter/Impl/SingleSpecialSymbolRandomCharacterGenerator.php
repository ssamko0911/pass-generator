<?php declare(strict_types=1);

namespace App\Service\Generator\SingleCharacter\Impl;

use App\Config\Character\Impl\SpecialSymbolCharacterConfig;
use App\Service\Generator\SingleCharacter\SingleRandomCharacterGenerator;

final class SingleSpecialSymbolRandomCharacterGenerator extends SingleRandomCharacterGenerator
{
    public function __construct(SpecialSymbolCharacterConfig $config)
    {
        parent::__construct($config);
    }
}
