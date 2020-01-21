<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationRepository;
use App\Entity\Reservation;
use App\Entity\Contact;

class DetailSalleController extends AbstractController
{
    /**
     * @Route("/detail/salle", name="detail_salle")
     */
    public function index(ReservationRepository $reservationRepository)
    {
        $id = $_GET['id'];
       $reservation = $entityManager = $this->getDoctrine()->getManager();
        if(isset($_GET['id'])){
        //    $reservation->getId();
        }

         $reservation->getRepository('App:Reservation')->findAll();
        return $this->render('detail_salle/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
            'reservation' => $reservation,
            'salle' => $_GET,
            'controller_name' => 'DetailSalleController',
        ]);
    }

    // /**
    //  * @Route("/detail/salle", name="detail_salle")
    //  */
    // public function show(ReservationRepository $reservationRepository)
    // {
    //     $contact = new Contact();
    //     $reservation = $entityManager = $this->getDoctrine()->getManager();
    //     $contact->setReservation($reservation);
    //     $form = $this->createForm(ContactType::class, $contact);
        

    //     return $this->render('detail_salle/index.html.twig', [
    //         'reservations' => $reservationRepository->findAll(),
    //         'reservation' => $reservation,
    //         'salle' => $_GET,
    //         'controller_name' => 'DetailSalleController',
    //         'form' => $form->createView()
    //     ]);
    // }


    // /**
    //  * @Route("/detail/salle", name="detail_salle", methods={"GET","POST"})
    //  */
    // public function showform(ReservationRepository $reservationRepository, Request $request, ContactNotification $contactNotification): Response
    // {
    //     $contact = new Contact();
        
    //     $contact->setReservation($reservation);
    //     $form = $this->createForm(ContactType::class, $contact);
    //     $form->handleRequest($request);

    //     if ($form->IsSubmitted() && $form->IsValid()) {
    //        $contactNotification->notify($contact);
    //         $this->addFlash('success', 'Votre email a bien été envoyé');
    //         return $this->redirectToRoute('detail_salle/index.html.twig');
    //     }

    //     return $this->render('detail_salle/index.html.twig', [
    //         'reservations' => $reservationRepository->findAll(),
    //         'reservation' => $reservation,
    //         'salle' => $_GET,
    //         'controller_name' => 'DetailSalleController',
    //         'form' => $form->createView()
    //     ]);
    // }

}
