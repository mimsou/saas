<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementRepository::class)]
#[ApiResource]
class Reglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $montant;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $numeroCheque;

    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'reglements')]
    #[ORM\JoinColumn(nullable: false)]
    private $idFacture;

    #[ORM\ManyToOne(targetEntity: ModeDePaiments::class, inversedBy: 'reglements')]
    #[ORM\JoinColumn(nullable: false)]
    private $idModePaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumeroCheque(): ?string
    {
        return $this->numeroCheque;
    }

    public function setNumeroCheque(?string $numeroCheque): self
    {
        $this->numeroCheque = $numeroCheque;

        return $this;
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

    public function getIdModePaiement(): ?ModeDePaiments
    {
        return $this->idModePaiement;
    }

    public function setIdModePaiement(?ModeDePaiments $idModePaiement): self
    {
        $this->idModePaiement = $idModePaiement;

        return $this;
    }
}
