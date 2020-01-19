<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CcmController extends AbstractController
{
    /**
     * @Route("/ccm", name="ccm")
     */
    public function index()
    {
        return $this->render('ccm/index.html.twig', [
            'controller_name' => 'CcmController',
        ]);
    }
}
