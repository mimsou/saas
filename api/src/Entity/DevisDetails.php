<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DevisDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisDetailsRepository::class)]
#[ApiResource]
class DevisDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Devis::class, inversedBy: 'devisDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $idDevis;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'devils')]
    #[ORM\JoinColumn(nullable: false)]
    private $article;

    #[ORM\Column(type: 'float')]
    private $quatite;

    #[ORM\Column(type: 'float')]
    private $prixHt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDevis(): ?Devis
    {
        return $this->idDevis;
    }

    public function setIdDevis(?Devis $idDevis): self
    {
        $this->idDevis = $idDevis;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getQuatite(): ?float
    {
        return $this->quatite;
    }

    public function setQuatite(float $quatite): self
    {
        $this->quatite = $quatite;

        return $this;
    }

    public function getPrixHt(): ?float
    {
        return $this->prixHt;
    }

    public function setPrixHt(float $prixHt): self
    {
        $this->prixHt = $prixHt;

        return $this;
    }
}
