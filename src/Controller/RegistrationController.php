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
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



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
        
        $formBuilder = $this->createFormBuilder($user)
            
            
            ->add('nom', TextType::class, array(
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre nom',
                    ])
                ]
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom',
                 'constraints' => [
                     new Length ([
                        'max' => 50,
                     ])
                 ]
            ))
            ->add('telephone', TextType::class, array(
                'label' => 'N° de Téléphone',
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'max' => 10,
                        'exactMessage' => 'Un numéro contient {{ limit }} numéros !',
                    ]),
                    new Type([
                        'type' => 'numeric',
                        'message' => 'Veuillez ne saisir que des numéro.',
                    ])

                ]
            ))
            ->add('email', TextType::class, array(
                'label' => 'Adresse Email',
                'constraints' => [
                    new Email([
                        'mode' => 'html5',
                        'message' => 'Veuillez saisir un format d\'email valide.',
                    ])
                ]
            ))
            ->add('username', TextType::class, array(
                'label' => 'Identifiant',
                'constraints' => [
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre identifiant doit contenir {{ limit }} caractères minimum',
                        'max' => 18,
                        'maxMessage' => 'Votre identifiant doit contenir {{ limit }} caractères maximum',
                    ])
                ]
            ))
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Avatar :',
            ])
        ;
        if(isset($_GET['type_user'])){
            $formBuilder->add('type_user', HiddenType::class, array(
                'label' => 'Statut',
                'data' => $_GET['type_user'],
                
            ));
        }

        if(isset($_GET['type_user']) && $_GET['type_user'] == 'user_pro'){
            $formBuilder->add('siret', TextType::class, array(
                    'label' => 'N° Siret',
                    'constraints' => [
                        new Length([
                            'min' => 14,
                            'max' => 14,
                            'exactMessage' => 'Un numéro SIRET contient {{ limit }} numéros.',
                        ]),
                        new Type([
                            'type' => 'numeric',
                            'message' => 'Veuillez ne saisir que des numéro.',
                        ])
                    ]
            ));
            $formBuilder->add('societe', TextType::class, array(
                            'label' => 'Nom Societe',
                        ));
        }
       
        $form = $formBuilder->getForm();
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

            $file = $user->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $user->setImage($fileName);

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
