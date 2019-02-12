<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 *@ORM\Table(name="utilisateur")
 */
class Utilisateur
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

    private $confirm_prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    public function __construct(){
        $this->updateAt = new \DateTime();
        $this->createAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getConfirmPassword(): ?string
    {
        return $this->confirm_prenom;
    }

    public function setConfirmPassword(string $confirm_prenom)
    {
        $this->confirm_prenom = $confirm_prenom;

        return $this;
    }


    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeInterface $updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }


}
