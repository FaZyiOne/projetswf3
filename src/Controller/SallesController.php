<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    /**
     * @Route("/salles", name="salles")
     */
    public function index()
    {
        return $this->render('salles/index.html.twig', [
            'controller_name' => 'SallesController',
        ]);
    }
}
