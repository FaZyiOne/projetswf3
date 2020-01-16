<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class FactureController extends AbstractController
{
    /**
     * @Route("/facture", name="facture")
     */
    public function index()
    {

        return $this->render('facture/index.html.twig');
        
    }
}
