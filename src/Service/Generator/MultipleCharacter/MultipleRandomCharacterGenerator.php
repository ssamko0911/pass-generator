<?php declare(strict_types=1);

namespace App\Service\Generator\MultipleCharacter;

use App\Service\Generator\SingleCharacter\SingleRandomCharacterGenerator;

abstract class MultipleRandomCharacterGenerator
{
    public function __construct(
        private readonly SingleRandomCharacterGenerator $generator
    ) {
    }

    /**
     * @param int $length
     * @return string
     */
    public function getMultipleCharacters(int $length): string
    {
        $multipleRandomChars = '';

        for ($i = 0; $i < $length; $i++) {
            $multipleRandomChars .= $this->generator->getCharacterFromPool();
        }

        return $multipleRandomChars;
    }
}
