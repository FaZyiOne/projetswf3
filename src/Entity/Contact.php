<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $prenom;

    /**
     * @var string|null
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=100)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     * pattern"/[0-9]{10}/"
     * )
     */
    private $telephone;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    // /**
    //  * @var Property|null
    //  */
    // private $property;


    /**
     * @return null|string  
     */
     public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param null|string $prenom
     * @return Contact
     */
    public function setPrenom(?string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }


    /**
     * @return null|string  
     */
     public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param null|string $nom
     * @return Contact
     */
    public function setNom(?string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return null|string  
     */
     public function getTelehone(): ?string
    {
        return $this->telephone;
    }

   /**
     * @param null|string $telephone
     * @return Contact
     */
    public function setTelephone(?string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }


    /**
     * @return null|string  
     */
     public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }


    /**
     * @return null|string  
     */
     public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param null|string $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }


    // /**
    //  * @return Property|null
    //  */
    //  public function getProperty(): ?Property
    // {
    //     return $this->property;
    // }

    // /**
    //  * @param Property|null $property
    //  * @return Contact
    //  */
    // public function setProperty(?Property $property): Contact
    // {
    //     $this->property = $property;
    //     return $this;
    // }
}   