<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FactureDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureDetailsRepository::class)]
#[ApiResource]
class FactureDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'facturesDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $idFacture;

    #[ORM\Column(type: 'float')]
    private $quatite;

    #[ORM\Column(type: 'float')]
    private $prixHt;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFacture(): ?Facture
    {
        return $this->idFacture;
    }

    public function setIdFacture(?Facture $idFacture): self
    {
        $this->idFacture = $idFacture;

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
