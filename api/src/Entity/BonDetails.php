<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BonDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonDetailsRepository::class)]
#[ApiResource]
class BonDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: BonDeLivraison::class, inversedBy: 'bonDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $idBonDeLivraison;

    #[ORM\OneToOne(targetEntity: DevisDetails::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $idDetailDevis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBonDeLivraison(): ?BonDeLivraison
    {
        return $this->idBonDeLivraison;
    }

    public function setIdBonDeLivraison(?BonDeLivraison $idBonDeLivraison): self
    {
        $this->idBonDeLivraison = $idBonDeLivraison;

        return $this;
    }

    public function getIdDetailDevis(): ?DevisDetails
    {
        return $this->idDetailDevis;
    }

    public function setIdDetailDevis(DevisDetails $idDetailDevis): self
    {
        $this->idDetailDevis = $idDetailDevis;

        return $this;
    }
}
