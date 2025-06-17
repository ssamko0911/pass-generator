<?php declare(strict_types=1);

namespace App\Service\Generator;

use App\Config\Character\Impl\NumberCharacterConfig;
use App\Config\Character\Impl\SpecialSymbolCharacterConfig;
use App\DTO\PasswordParamDTO;
use App\Manager\CharacterDistributionManager;
use App\Service\Generator\MultipleCharacter\Impl\MultipleNumberRandomCharacterGenerator;
use App\Service\Generator\MultipleCharacter\Impl\MultipleSpecialSymbolRandomCharacterGenerator;
use App\Service\Generator\MultipleCharacter\MultipleRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleNumberRandomCharacterGenerator;
use App\Service\Generator\SingleCharacter\Impl\SingleSpecialSymbolRandomCharacterGenerator;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Random\RandomException;
use RuntimeException;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final class PasswordGeneratorService
{
    public function __construct(
        private readonly CharacterDistributionManager $manager,
        private readonly LoggerInterface $logger,
        #[TaggedIterator('app.multiple_char_generator')]
        private iterable $generators,
    ) {
    }

    public function generate(PasswordParamDTO $passwordParams): string
    {
        $tempPass = '';

        if ($passwordParams->numbers) {
            $this->setCharacterGenerator(
                $this->createNumberCharacterGenerator()
            );
        }

        if ($passwordParams->special_symbols) {
            $this->setCharacterGenerator(
                $this->createSpecialSymbolCharacterGenerator()
            );
        }

        $distribution = $this->manager->getCharacterDistribution(
            $passwordParams->length,
            count(iterator_to_array($this->generators))
        );

        try {
            foreach ($distribution as $key => $length) {
                $tempPass .= iterator_to_array($this->generators)[$key]
                    ->getMultipleCharacters($length);
            }

            return $this->shuffle($tempPass);
        } catch (InvalidArgumentException|RuntimeException $e) {
            $this->logger->error($e->getMessage());
            throw new RuntimeException($e->getMessage());
        }
    }

    private function createNumberCharacterGenerator(): MultipleNumberRandomCharacterGenerator
    {
        return new MultipleNumberRandomCharacterGenerator(
            new SingleNumberRandomCharacterGenerator(
                new NumberCharacterConfig()
            )
        );
    }

    private function createSpecialSymbolCharacterGenerator(): MultipleSpecialSymbolRandomCharacterGenerator
    {
        return new MultipleSpecialSymbolRandomCharacterGenerator(
            new SingleSpecialSymbolRandomCharacterGenerator(
                new SpecialSymbolCharacterConfig()
            )
        );
    }

    private function setCharacterGenerator(MultipleRandomCharacterGenerator $generator): void
    {
        $this->generators = array_merge(
            iterator_to_array($this->generators),
            [$generator]
        );
    }

    private function shuffle(string $tempPass): string
    {
        $characters = str_split($tempPass);
        try {
            for ($i = count($characters) - 1; $i > 0; $i--) {
                $random = random_int(0, $i);
                [$characters[$i], $characters[$random]] = [$characters[$random], $characters[$i]];
            }
        } catch (RandomException $e) {
            $this->logger->error($e->getMessage());
            throw new RuntimeException($e->getMessage());
        }

        return implode('', $characters);
    }
}
