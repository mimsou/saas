<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BonDeLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonDeLivraisonRepository::class)]
#[ApiResource]
class BonDeLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateLivraison;

    #[ORM\OneToMany(mappedBy: 'idBonDeLivraison', targetEntity: BonDetails::class)]
    private $bonDetails;

    #[ORM\ManyToOne(targetEntity: Facture::class, inversedBy: 'bonDeLivraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private $idFacture;

    public function __construct()
    {
        $this->bonDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * @return Collection|BonDetails[]
     */
    public function getBonDetails(): Collection
    {
        return $this->bonDetails;
    }

    public function addBonDetail(BonDetails $bonDetail): self
    {
        if (!$this->bonDetails->contains($bonDetail)) {
            $this->bonDetails[] = $bonDetail;
            $bonDetail->setIdBonDeLivraison($this);
        }

        return $this;
    }

    public function removeBonDetail(BonDetails $bonDetail): self
    {
        if ($this->bonDetails->removeElement($bonDetail)) {
            // set the owning side to null (unless already changed)
            if ($bonDetail->getIdBonDeLivraison() === $this) {
                $bonDetail->setIdBonDeLivraison(null);
            }
        }

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
}
