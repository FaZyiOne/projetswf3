<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Reservation;

class Contact {

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $prenom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Date
     */
    private $eventdate;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     * pattern="/[0-9]{5}/"
     * )
     */
    private $nombre;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @var Reservation|null
     */
    private $reservation;

    /**
     * @return null|string
     */
     public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param null|string $nom
     * return Contact
     */
    public function setNom(?string $nom): Contact
    {
        $this->nom = $nom;
        return $this;

    /**
     * @return null|string
     */   
    }
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param null|string $prenom
     * return Contact
     */
    public function setPrenom(?string $prenom): Contact
    {
        $this->prenom = $prenom;
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
     * return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
     public function getEventdate(): ?string
    {
        return $this->eventdate;
    }

    /**
     * @param null|string $eventdate
     * return Contact
     */
    public function setEventdate(?string $eventdate): Contact
    {
        $this->eventdate = $eventdate;
        return $this;
    }

    /**
     * @return null|string
     */
     public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param null|string $nombre
     * return Contact
     */
    public function setNombre(?string $nombre): Contact
    {
        $this->nombre = $nombre;
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
     * return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Reservation|null
     */
     public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    /**
     * @param Reservation|null $reservation
     * return Contact
     */
    public function setReservation(?Reservation $reservation): Contact
    {
        $this->reservation = $reservation;

        return $this;
    }
}