<?php declare(strict_types=1);

namespace App\Manager;

class CharacterDistributionManager
{
    /**
     * @param int $length
     * @param int $configCount
     * @return int[]
     */
    public function getCharacterDistribution(int $length, int $configCount): array
    {
        $base = intdiv($length, $configCount);
        $reminder = $length % $configCount;

        $distribution = array_fill(0, $configCount, $base);

        $keys = array_keys($distribution);
        for ($i = 0; $i < $reminder; $i++) {
            $randomKey = $keys[array_rand($keys)];
            $distribution[$randomKey]++;
        }

        return $distribution;
    }
}
