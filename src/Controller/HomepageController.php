<?php

namespace App\Controller;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(ReservationRepository $reservationRepository)
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'reservations' => $reservationRepository->findAll()
        ]);
    }
}
