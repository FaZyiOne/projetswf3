<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationRepository;

class CartController extends AbstractController

{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, ReservationRepository $reservationRepository)
    {
        $panier = $session->get('panier', []);

        $panierWithData = [];

        foreach($panier as $id =>$quantity) {
            $panierWithData[] = [
                'reservation' => $reservationRepository->find($id),  
                'quantity' => $quantity

            ];
        }

        return $this->render('cart/index.html.twig', [
            'items' => $panierWithData
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session) 
    {
        $panier = $session->get('panier', []);

        if(!empty($panier[id])) {
            $panier[$id]++;
        } else {

            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        dd($session->get('panier'));

    }
}
