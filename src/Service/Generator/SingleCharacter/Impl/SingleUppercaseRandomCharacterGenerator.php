<?php declare(strict_types=1);

namespace App\Service\Generator\SingleCharacter\Impl;

use App\Config\Character\Impl\UppercaseLetterCharacterConfig;
use App\Service\Generator\SingleCharacter\SingleRandomCharacterGenerator;

final class SingleUppercaseRandomCharacterGenerator extends SingleRandomCharacterGenerator
{
    public function __construct(UppercaseLetterCharacterConfig $config)
    {
        parent::__construct($config);
    }
}
