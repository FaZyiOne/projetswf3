<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;



class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // $form->getForm();
        //$form->handleRequest($request);
        $user = new User();
        
        $formBuiler = $this->createFormBuilder($user)
            
            
            ->add('nom', TextType::class, array(
                'label' => 'Nom'
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom' 
            ))
            ->add('telephone', TextType::class, array(
                'label' => 'N° de Téléphone'
            ))
            ->add('email', TextType::class, array(
                'label' => 'Adresse Email'
            ))
            ->add('username', TextType::class, array(
                'label' => 'Identifiant'
            ))
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
           
        ;
        if(isset($_GET['type_user'])){
            $formBuiler->add('type_user', HiddenType::class, array(
                'label' => 'Statut',
                'data' => $_GET['type_user'],
                
            ));
        }

        if(isset($_GET['type_user']) && $_GET['type_user'] == 'user_pro'){
            $formBuiler->add('siret', TextType::class, array(
                    'label' => 'N° Siret',
            ));
        }
       
        $form = $formBuiler->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setRoles(['ROLE_USER']);
            
            if($_GET['type_user'] == 'user_pro')
            {
                $user->setRoles( ['ROLE_USER_PRO']);
            }

            $user->setEnabled(true);
            $user->setSalt(md5(uniqid(null,true)));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            

            // do anything else you need here, like send an email

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
