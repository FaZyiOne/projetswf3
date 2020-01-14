<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    /**
     * @Route("/payment", name="payment")
     */
    public function index(ReservationRepository $reservationRepository)
    {
        return $this->render('payment/index.html.twig', []);
    }
}