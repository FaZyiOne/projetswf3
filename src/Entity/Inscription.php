<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_naissance;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_telephone;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_salle;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mot_de_passe;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }
    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;
        return $this;
    }
    public function getVille(): ?string
    {
        return $this->ville;
    }
    public function setVille(string $ville): self
    {
        $this->ville = $ville;
        return $this;
    }
    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }
    public function setDateNaissance(string $date_naissance): self
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }
    public function getNumeroTelephone(): ?string
    {
        return $this->numero_telephone;
    }
    public function setNumeroTelephone(string $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;
        return $this;
    }
    public function getNomSalle(): ?string
    {
        return $this->nom_salle;
    }
    public function setNomSalle(?string $nom_salle): self
    {
        $this->nom_salle = $nom_salle;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }
    public function setMotDePasse(string $mot_de_passe): self
    {
        $this->mot_de_passe = $mot_de_passe;
        return $this;
    }
}