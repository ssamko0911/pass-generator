<?php declare (strict_types = 1);

namespace App\Service\Generator\SingleCharacter;

use App\Config\Character\CharacterConfig;
use InvalidArgumentException;

abstract class SingleRandomCharacterGenerator
{
    public function __construct(
        protected readonly CharacterConfig $config
    )
    {
    }

    public function getCharacterFromPool(): string
    {
        $charPool = ($this->config->getCharPool());

        if (empty($charPool)) {
            throw new InvalidArgumentException('CharacterPool cannot be empty');
        }

        $charCode = $charPool[array_rand($charPool)];

        return chr($charCode);
    }
}
