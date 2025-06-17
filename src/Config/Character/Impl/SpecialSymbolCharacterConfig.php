<?php declare(strict_types=1);

namespace App\Config\Character\Impl;

use App\Config\Character\CharacterConfig;

final class SpecialSymbolCharacterConfig extends CharacterConfig
{
    public function __construct()
    {
        parent::__construct();
        $this->charPool = array_merge(
            range(32, 38),
            range(40, 43),
            [45, 46],
            range(58, 64),
            [91],
            range(93, 96),
            range(123, 126),
        );
    }
}
