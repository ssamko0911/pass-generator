<?php declare(strict_types=1);

namespace App\Config\Character;

abstract class CharacterConfig
{
    /** @var int[] */
    protected array $charPool;

    public function __construct()
    {
    }

    /**
     * @return int[]
     */
    public function getCharPool(): array
    {
        return $this->charPool;
    }
}
