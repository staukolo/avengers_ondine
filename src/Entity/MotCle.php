<?php

namespace App\Entity;

use App\Repository\MotCleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotCleRepository::class)]
class MotCle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Marquepage>
     */
    #[ORM\ManyToMany(targetEntity: Marquepage::class, mappedBy: 'motCles')]
    private Collection $marquepages;

    public function __construct()
    {
        $this->marquepages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Marquepage>
     */
    public function getMarquepages(): Collection
    {
        return $this->marquepages;
    }

    public function addMarquepage(Marquepage $marquepage): static
    {
        if (!$this->marquepages->contains($marquepage)) {
            $this->marquepages->add($marquepage);
            $marquepage->addMotCle($this);
        }

        return $this;
    }

    public function removeMarquepage(Marquepage $marquepage): static
    {
        if ($this->marquepages->removeElement($marquepage)) {
            $marquepage->removeMotCle($this);
        }

        return $this;
    }
}
