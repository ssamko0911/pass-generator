<?php declare(strict_types=1);

namespace App\Service\Generator\SingleCharacter\Impl;

use App\Config\Character\Impl\LowercaseLetterCharacterConfig;
use App\Service\Generator\SingleCharacter\SingleRandomCharacterGenerator;

final class SingleLowercaseRandomCharacterGenerator extends SingleRandomCharacterGenerator
{
    public function __construct(LowercaseLetterCharacterConfig $config)
    {
        parent::__construct($config);
    }
}
