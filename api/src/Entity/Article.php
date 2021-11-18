<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $designation;

    #[ORM\Column(type: 'integer')]
    private $etat;

    #[ORM\ManyToOne(targetEntity: ArticleFamille::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $famille;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: DevisDetails::class)]
    private $devils;

    public function __construct()
    {
        $this->devils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

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

    public function getFamille(): ?ArticleFamille
    {
        return $this->famille;
    }

    public function setFamille(?ArticleFamille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|DevisDetails[]
     */
    public function getDevils(): Collection
    {
        return $this->devils;
    }

    public function addDevil(DevisDetails $devil): self
    {
        if (!$this->devils->contains($devil)) {
            $this->devils[] = $devil;
            $devil->setArticle($this);
        }

        return $this;
    }

    public function removeDevil(DevisDetails $devil): self
    {
        if ($this->devils->removeElement($devil)) {
            // set the owning side to null (unless already changed)
            if ($devil->getArticle() === $this) {
                $devil->setArticle(null);
            }
        }

        return $this;
    }
}
