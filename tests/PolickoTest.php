<?php


use Sachovnice\Entity\Policko;
use PHPUnit\Framework\TestCase;

class PolickoTest extends TestCase
{
    public function testRangeConstructorX(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $policko = new Policko(8, 0);
    }

    public function testRangeConstructorY(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $p = new Policko(0, 8);
    }

    public function testRangeConstructorXNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $p = new Policko(-1, 0);
    }

    public function testRangeConstructorYNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $p = new Policko(0, -1);
    }
}
