<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    /**
     * @Route("/salles", name="salles")
     */
    public function index(ReservationRepository $reservationRepository)
    {
        return $this->render('salles/index.html.twig', [
            'reservations' => $reservationRepository->findAll()
        ]);
    }
}
