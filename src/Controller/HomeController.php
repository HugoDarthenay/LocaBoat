<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Asset\Package;

class HomeController extends AbstractController
{
   /**
    * Page accueil du site
    * @Route("home/accueil", name="accueil")
    */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
}
