<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Type;
use App\Entity\Size;
Use App\Entity\Boat;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $listType = array();
        $listSize = array();

        $libelleType = array("moteur", "voile");
        $libelleSize = array("petit", "moyen", "grand");

        foreach($libelleType as $libelle)
        {
            $type = new Type();
            $type->setLibelle($libelle);
            $listType[]= $type;
            $manager->persist($type);
        }

        foreach($libelleSize as $libelle)
        {
            $size = new Size();
            $size->setLibelle($libelle);
            $listSize[]= $size;
            $manager->persist($size);
        }

        $listBoat = array(
            array("name" => "L'Espadon", "type" => $listType[1], "size" => $listSize[1], "resume" => "Bateau de croisière sympatique pour une petite dizaine de personnes et quelque jour de ravitaillement.", "img" => "asset/img/boat/espadon.jpg", "priceHour" => 99.99),
            array("name" => "Le Homar", "type" => $listType[0], "size" => $listSize[0], "resume" => "Bateau de palisance rapide et petit pour une éxcursion en mer courte.", "img" => "asset/img/boat/homar.jpg", "priceHour" => 49.99),
            array("name" => "La Crevette", "type" => $listType[1], "size" => $listSize[0], "resume" => "petit bateau de croisière pour une éscursion en bord de côte.", "img" => "asset/img/boat/crevette.jpg", "priceHour" => 44.99),
            array("name" => "Le Bezos", "type" => $listType[0], "size" => $listSize[2], "resume" => "Yatch luxueux et amménager pour des fêtes en plein mer pouvant contenir environt 200 personnes", "img" => "asset/img/boat/bezos.jpg", "priceHour" => 999.99),
            array("name" => "Le Requin", "type" => $listType[0], "size" => $listSize[1], "resume" => "Bateau rapide et conformtable", "img" => "asset/img/boat/requin.jpg", "priceHour" => 149.99),
            array("name" => "Nemo", "type" => $listType[1], "size" => $listSize[2], "resume" => "Bateau de croisière comfortable et maniable", "img" => "asset/img/boat/nemo.jpg", "priceHour" => 129.99),
            array("name" => "Le Dauphin", "type" => $listType[0], "size" => $listSize[1], "resume" => "Bateau de croisière rapide et maniable", "img" => "asset/img/boat/dauphin.jpg", "priceHour" => 99.99),
            array("name" => "Voyageur", "type" => $listType[1], "size" => $listSize[2], "resume" => "Bateau de croisière conçu pour de long déplacement", "img" => "asset/img/boat/voyageur.jpg", "priceHour" => 299.99),
        );

        foreach($listBoat as $attribut)
        {
            $boat = new Boat();
            $boat->setName($attribut["name"]);
            $boat->setType($attribut["type"]);
            $boat->setSize($attribut["size"]);
            $boat->setResume($attribut["resume"]);
            $boat->setImg($attribut["img"]);
            $boat->setPriceHour($attribut["priceHour"]);
            $manager->persist($boat);
        }

        $manager->flush();
    }
}
