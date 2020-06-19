<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SachovniceTest extends TestCase
{
    public function testOne(): void
    {
        $app = new \Sachovnice\App();
        $a = new \Sachovnice\Entity\Policko(0,0);
        $b = new \Sachovnice\Entity\Policko(5,5);

        $this->assertCount(5, $app->nejkratsiCestaKone($a,$b));
    }

    public function testTwo(): void
    {
        $app = new \Sachovnice\App();
        $a = new \Sachovnice\Entity\Policko(0,0);
        $b = new \Sachovnice\Entity\Policko(7,7);

        $this->assertCount(7, $app->nejkratsiCestaKone($a,$b));
    }

    public function testThree(): void
    {
        $app = new \Sachovnice\App();
        $a = new \Sachovnice\Entity\Policko(7,7);
        $b = new \Sachovnice\Entity\Policko(6,5);

        $this->assertCount(2, $app->nejkratsiCestaKone($a,$b));
    }

    public function testSameValues(): void
    {
        $app = new \Sachovnice\App();
        $a = new \Sachovnice\Entity\Policko(7,7);
        $b = new \Sachovnice\Entity\Policko(7,7);

        $result =$app->nejkratsiCestaKone($a,$b);
        $this->assertCount(1, $result);
        $this->assertSame([7,7], $result[0]->getCoords());
    }
}
