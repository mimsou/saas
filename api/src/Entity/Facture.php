<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
#[ApiResource]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\OneToMany(mappedBy: 'idFacture', targetEntity: FactureDetails::class)]
    private $facturesDetails;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private $idClient;

    #[ORM\OneToMany(mappedBy: 'idFacture', targetEntity: BonDeLivraison::class)]
    private $bonDeLivraisons;

    #[ORM\OneToMany(mappedBy: 'idFacture', targetEntity: Acompte::class)]
    private $acomptes;

    #[ORM\OneToMany(mappedBy: 'idFacture', targetEntity: Reglement::class)]
    private $reglements;

    public function __construct()
    {
        $this->facturesDetails = new ArrayCollection();
        $this->bonDeLivraisons = new ArrayCollection();
        $this->acomptes = new ArrayCollection();
        $this->reglements = new ArrayCollection();
    }
 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|FactureDetails[]
     */
    public function getFacturesDetails(): Collection
    {
        return $this->facturesDetails;
    }

    public function addFacturesDetail(FactureDetails $facturesDetail): self
    {
        if (!$this->facturesDetails->contains($facturesDetail)) {
            $this->facturesDetails[] = $facturesDetail;
            $facturesDetail->setIdFacture($this);
        }

        return $this;
    }

    public function removeFacturesDetail(FactureDetails $facturesDetail): self
    {
        if ($this->facturesDetails->removeElement($facturesDetail)) {
            // set the owning side to null (unless already changed)
            if ($facturesDetail->getIdFacture() === $this) {
                $facturesDetail->setIdFacture(null);
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

    /**
     * @return Collection|BonDeLivraison[]
     */
    public function getBonDeLivraisons(): Collection
    {
        return $this->bonDeLivraisons;
    }

    public function addBonDeLivraison(BonDeLivraison $bonDeLivraison): self
    {
        if (!$this->bonDeLivraisons->contains($bonDeLivraison)) {
            $this->bonDeLivraisons[] = $bonDeLivraison;
            $bonDeLivraison->setIdFacture($this);
        }

        return $this;
    }

    public function removeBonDeLivraison(BonDeLivraison $bonDeLivraison): self
    {
        if ($this->bonDeLivraisons->removeElement($bonDeLivraison)) {
            // set the owning side to null (unless already changed)
            if ($bonDeLivraison->getIdFacture() === $this) {
                $bonDeLivraison->setIdFacture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Acompte[]
     */
    public function getAcomptes(): Collection
    {
        return $this->acomptes;
    }

    public function addAcompte(Acompte $acompte): self
    {
        if (!$this->acomptes->contains($acompte)) {
            $this->acomptes[] = $acompte;
            $acompte->setIdFacture($this);
        }

        return $this;
    }

    public function removeAcompte(Acompte $acompte): self
    {
        if ($this->acomptes->removeElement($acompte)) {
            // set the owning side to null (unless already changed)
            if ($acompte->getIdFacture() === $this) {
                $acompte->setIdFacture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reglement[]
     */
    public function getReglements(): Collection
    {
        return $this->reglements;
    }

    public function addReglement(Reglement $reglement): self
    {
        if (!$this->reglements->contains($reglement)) {
            $this->reglements[] = $reglement;
            $reglement->setIdFacture($this);
        }

        return $this;
    }

    public function removeReglement(Reglement $reglement): self
    {
        if ($this->reglements->removeElement($reglement)) {
            // set the owning side to null (unless already changed)
            if ($reglement->getIdFacture() === $this) {
                $reglement->setIdFacture(null);
            }
        }

        return $this;
    }

    
}
