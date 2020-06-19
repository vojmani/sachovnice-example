<?php
require __DIR__."/vendor/autoload.php";

$app = new \Sachovnice\App();
$a = new \Sachovnice\Entity\Policko(0,0);
$b = new \Sachovnice\Entity\Policko(7,7);
$out = ($app->nejkratsiCestaKone($a, $b));

echo "\n\n\n";
foreach($out as $value){
    $coords = $value->getCoords();
    echo $coords[0].",".$coords[1]."\n";
}

