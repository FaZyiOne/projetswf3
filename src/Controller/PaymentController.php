<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="payment")
     */
    public function indexAction()
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_oazArn1Rva1TYTJx7zbpCcst00K1PE0LHL');
        
        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $total = $_GET['total'];

        if (isset($_POST['stripeToken'])) {
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
                'amount' => ($total * 100),
                'currency' => 'eur',
                'description' => '$MONEY$MONEY$MONEY$',
                'source' => $token,
              ]);

            return $this->render('facture/index.html.twig');

        } else {
            $errors['token'] = 'The order cannot be processed. Please make sure you have JavaScript enabled and try again.';
        }

        return $this->render('payment/index.html.twig');
        
    }
}


