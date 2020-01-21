<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccessdeniedController extends AbstractController
{
    /**
     * @Route("/accessdenied", name="accessdenied")
     */
    public function index()
    {
        return $this->render('accessdenied/index.html.twig', [
            'controller_name' => 'AccessdeniedController',
        ]);
    }
}
