<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Type;
use App\Entity\Size;
use App\Entity\Boat;
use App\Repository\BoatRepository;
use App\Repository\SizeRepository;
use App\Repository\TypeRepository;

class BoatController extends AbstractController
{
    /**
     * Page avec tout les bateaux
     * @Route("boat/all", name="all")
     */
    public function index(BoatRepository $repoBoat, SizeRepository $repoSize, TypeRepository $repoType): Response
    {
        $listBoat = $repoBoat->findAll();
        $listSize = $repoSize->findAll();
        $listType = $repoType->findAll();

        $test = $repoType->findByExampleField(6);

        $param = array("listBoat" => $listBoat, "listSize" => $listSize, "listType" => $listType, "test"=>$test);

        return $this->render('boat/index.html.twig', $param);
    }

    /**
     * Page avec les bateaux filtrer
     * @Route("boat/filtre", name="filtre")
     */
    public function filtre(BoatRepository $repoBoat, SizeRepository $repoSize, TypeRepository $repoType): Response
    {
        var_dump($_POST);

        $listBoat = $repoBoat->findAll();
        $listSize = $repoSize->findAll();
        $listType = $repoType->findAll();

        foreach($listBoat as $boat)
        {
            $type = false;
            $size = false;

            foreach($_POST as $attribut)
            {
                if($attribut == $boat->getType()->getLibelle())
                {
                    $type = true;
                }

                if($attribut == $boat->getSize()->getLibelle())
                {
                    $size = true;
                }
            }

            if($type && $size)
            {
                echo $boat->getName();
            }
        }

        $param = array("listBoat" => $listBoat, "listSize" => $listSize, "listType" => $listType);

        return $this->render('boat/index.html.twig', $param);
    }
}
