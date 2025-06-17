<?php declare(strict_types=1);

namespace App\Service\Generator\SingleCharacter\Impl;

use App\Config\Character\Impl\NumberCharacterConfig;
use App\Service\Generator\SingleCharacter\SingleRandomCharacterGenerator;

final class SingleNumberRandomCharacterGenerator extends SingleRandomCharacterGenerator
{
    public function __construct(NumberCharacterConfig $config)
    {
        parent::__construct($config);
    }
}
