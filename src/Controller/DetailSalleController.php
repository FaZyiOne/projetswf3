<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationRepository;
use App\Entity\Reservation;


class DetailSalleController extends AbstractController
{
    /**
     * @Route("/detail/salle", name="detail_salle")
     */
    public function index(ReservationRepository $reservationRepository)
    {
       $reservation = $entityManager = $this->getDoctrine()->getManager();

         $reservation->getRepository('App:Reservation')->findAll();
        return $this->render('detail_salle/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
            'reservation' => $reservation,
            'salle' => $_GET,
            'controller_name' => 'DetailSalleController',
        ]);
    }
}