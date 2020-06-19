<?php
declare(strict_types=1);


namespace Sachovnice;


use Sachovnice\Entity\Policko;
use Sachovnice\Structure\TreeNode;

class App
{
    private array $checkedCoords = [];

    private array $relativePossibleCoords = [
        [1, 2],
        [2, 1],
        [1, -2],
        [2, -1],
        [-1, -2],
        [-2, -1],
        [-1, 2],
        [-2, 1]
    ];

    /**
     * @param Policko $a
     * @param Policko $b
     * @return Policko[]
     */
    public function nejkratsiCestaKone(Policko $a, Policko $b): array
    {
        //Kontrola zakladni veci :)
        if ($a->getCoords() === $b->getCoords()) {
            return [$a];
        }

        $root = new TreeNode($a);
        $toCheck = [$root];
        while(count($toCheck) > 0){
            $current = $toCheck[0];
            $currCoords = $current->getValue()->getCoords();
            foreach($this->relativePossibleCoords as $coord){
                $newCoords = [$currCoords[0] + $coord[0], $currCoords[1] + $coord[1]];

                if(!Policko::isValidPosition($newCoords))
                    continue;

                if(in_array($newCoords, $this->checkedCoords)){
                    continue;
                }

                $p = new Policko($newCoords[0], $newCoords[1]);

                $node = new TreeNode($p, $current);

                if($newCoords === $b->getCoords()){
                    //WIN
                    return array_reverse($node->getStackToRoot());
                }
                array_push($this->checkedCoords, $newCoords);
                array_push($toCheck, $node);
            }
            array_shift($toCheck);
        }
        throw new \LogicException("Tohle by nastat nemelo, ale nejak ten vystup musime osetrit :(");
    }
}