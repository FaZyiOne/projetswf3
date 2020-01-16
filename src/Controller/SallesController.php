<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Response;


class SallesController extends AbstractController
{
    /**
     * @Route("/salles", name="salles", methods={"GET","POST"})
     */
    public function index(ReservationRepository $reservationRepository)
    {
        return $this->render('salles/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
            'test' => $_POST,
            'test2' => isset($_POST['ville']),
        ]);
    }

    /**
     * @Route("/salles/show", name="salles_show", methods={"GET","POST"})
     */
    public function show(ReservationRepository $reservationRepository): Response
    {
                    $entityManager = $this->getDoctrine()->getManager();

        return $this->render('salles/show.html.twig', [
            // 'reservation' => $reservation,
            'reservations' => $reservationRepository->findAll(),
            
        ]);
    }
}
