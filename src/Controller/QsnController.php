<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QsnController extends AbstractController
{
    /**
     * @Route("/qsn", name="qsn")
     */
    public function index()
    {
        return $this->render('qsn/index.html.twig', [
            'controller_name' => 'QsnController',
        ]);
    }
}
