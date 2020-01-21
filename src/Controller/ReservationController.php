<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use App\Entity\Contact;



/**
 * @Route("/reservation")
 */
class ReservationController extends AbstractController
{
    /**
     * @Route("/", name="reservation_index", methods={"GET","POST"})
     */
    public function index(ReservationRepository $reservationRepository): Response
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('App:Reservation')->getLastInserted('App:Reservation', 50);
        
        if (isset($_POST['stripeToken'])) {
        
        } else {
            $errors['token'] = 'La commande ne peut pas être traitée. Veuillez vous assurer que JavaScript est activé et réessayer.';
        }

        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
            'test' => $_POST,
            'test2' => isset($_POST['ville']),
        ]);

        
    }

    /**
     * @Route("/new", name="reservation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        // if(!$this->getUser()) {
        //     $this->addFlash('notice', 'You must be identified to access this section');

        //     return $this->redirectToRoute('post_index');
        // }

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $reservation->setUser($this->getUser());

            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation_index');
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
            'test' => $_POST,
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_show", methods={"GET","POST"})
     */

    public function show(Reservation $reservation, Request $request): Response
    {
       
        // return $this->render('reservation/show.html.twig', [
        //     'reservation' => $reservation,
             
        // ]);

    $rpost = new Post();
        $form = $this->createForm(PostType::class, $rpost);
        $form->handleRequest($request);


        $entityManager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();

            $rpost->setUser($this->getUser());
            $rpost->setReservation($reservation);

            $entityManager->persist($rpost);
            $entityManager->flush();

            return $this->redirectToRoute('salles');
        }

        $rposts = $entityManager->getRepository('App:Post')->findByReservation($reservation);

        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
            'rposts' => $rposts
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reservation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reservation $reservation): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_index');
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reservation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reservation $reservation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

  
    /**
     * @Route("/api/reservation/", name="api_reservation_index", methods={"GET"})
     */
    public function apiIndex()
    {
        $em = $this->getDoctrine()->getManager();
        
        $reservations = $em->getRepository('App:Reservation')->getLastInsertedAjax('App:Reservation', 5);
        return new JsonResponse(array(
            'reservations' => $reservations
        ));
    }

    // /**
    //  * @Route("/detail/salle", name="detail_salle", methods={"GET","POST"})
    //  */
    // public function showform(Reservation $reservation, Request $request, ContactNotification $contactNotification): Response
    // {
    //     $contact = new Contact();
    //     $contactNotification->notify($contact);
    //     $contact->setReservation($reservation);
    //     $form = $this->createForm(ContactType::class, $contact);

    // if ($form->IsSubmitted() && $form->IsValid()) {
        //    $contactNotification->notify($contact);
        //     $this->addFlash('success', 'Votre email a bien été envoyé');
        //     return $this->redirectToRoute('detail_salle/index.html.twig');
        // }
        

    //     return $this->render('detail_salle/index.html.twig', [
    //         'reservations' => $reservationRepository->findAll(),
    //         'reservation' => $reservation,
    //         'salle' => $_GET,
    //         'controller_name' => 'DetailSalleController',
    //         'form' => $form->createView()
    //     ]);
    // }
}
