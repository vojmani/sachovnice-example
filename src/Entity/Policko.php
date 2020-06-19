<?php
declare(strict_types=1);

namespace Sachovnice\Entity;

class Policko
{
    const MIN_X = 0;
    const MAX_X = 7;
    const MIN_Y = 0;
    const MAX_Y = 7;

    private int $x;

    private int $y;

    public function __construct(int $x, int $y)
    {
        if (!self::isValidPosition([$x, $y])) {
            throw new \InvalidArgumentException("x nebo y mimo rozsah.");
        }
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return array
     */
    public function getCoords(): array
    {
        return [$this->x, $this->y];
    }

    public static function isValidPosition(array $coords): bool
    {
        list($x, $y) = $coords;
        return ($x >= self::MIN_X && $x <= self::MAX_X && $y >= self::MIN_Y && $y <= self::MAX_Y);
    }
}