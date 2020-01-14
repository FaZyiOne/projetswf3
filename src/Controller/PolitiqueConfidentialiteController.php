<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PolitiqueConfidentialiteController extends AbstractController
{
    /**
     * @Route("/politique/confidentialite", name="politique_confidentialite")
     */
    public function index()
    {
        return $this->render('politique_confidentialite/index.html.twig', [
            'controller_name' => 'PolitiqueConfidentialiteController',
        ]);
    }
}
