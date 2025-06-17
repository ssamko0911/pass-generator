<?php declare(strict_types=1);

namespace App\Config\Character\Impl;

use App\Config\Character\CharacterConfig;

final class LowercaseLetterCharacterConfig extends CharacterConfig
{
    public function __construct()
    {
        parent::__construct();
        $this->charPool = range(97, 122);
    }
}
