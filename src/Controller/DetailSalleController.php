<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailSalleController extends AbstractController
{
    /**
     * @Route("/detail/salle", name="detail_salle")
     */
    public function index()
    {
        return $this->render('detail_salle/index.html.twig', [
            'controller_name' => 'DetailSalleController',
        ]);
    }
}
