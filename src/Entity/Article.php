<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    // *
    //  * @ORM\ManyToOne(targetEntity="App\Entity\TypeArticle", inversedBy="articles")
     
    // private $typeArticle;

    // *
    //  * @ORM\Column(type="integer")
     
    // private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    // public function getTypeArticle(): ?TypeArticle
    // {
    //     return $this->typeArticle;
    // }

    // public function setTypeArticle(?TypeArticle $typeArticle): self
    // {
    //     $this->typeArticle = $typeArticle;

    //     return $this;
    // }

    // public function getEtat(): ?int
    // {
    //     return $this->etat;
    // }

    // public function setEtat(int $etat): self
    // {
    //     $this->etat = $etat;

    //     return $this;
    // }
}
