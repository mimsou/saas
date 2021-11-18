<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DevisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
#[ApiResource]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateEnvoie;

    #[ORM\Column(type: 'datetime')]
    private $dateValidation;

    #[ORM\Column(type: 'float')]
    private $mantantDevis;

    #[ORM\Column(type: 'integer')]
    private $etat;

    #[ORM\OneToMany(mappedBy: 'idDevis', targetEntity: DevisDetails::class)]
    private $devisDetails;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private $idClient;

    public function __construct()
    {
        $this->devisDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoie(): ?\DateTimeInterface
    {
        return $this->dateEnvoie;
    }

    public function setDateEnvoie(\DateTimeInterface $dateEnvoie): self
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }

    public function getDateValidation(): ?\DateTimeInterface
    {
        return $this->dateValidation;
    }

    public function setDateValidation(\DateTimeInterface $dateValidation): self
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    public function getMantantDevis(): ?float
    {
        return $this->mantantDevis;
    }

    public function setMantantDevis(float $mantantDevis): self
    {
        $this->mantantDevis = $mantantDevis;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection|DevisDetails[]
     */
    public function getDevisDetails(): Collection
    {
        return $this->devisDetails;
    }

    public function addDevisDetail(DevisDetails $devisDetail): self
    {
        if (!$this->devisDetails->contains($devisDetail)) {
            $this->devisDetails[] = $devisDetail;
            $devisDetail->setIdDevis($this);
        }

        return $this;
    }

    public function removeDevisDetail(DevisDetails $devisDetail): self
    {
        if ($this->devisDetails->removeElement($devisDetail)) {
            // set the owning side to null (unless already changed)
            if ($devisDetail->getIdDevis() === $this) {
                $devisDetail->setIdDevis(null);
            }
        }

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }
}
