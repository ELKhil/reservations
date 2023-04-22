<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
#[ORM\Table(name: "types")]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'types', targetEntity: ArtistType::class)]
    private Collection $artists;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getArtists(): ArrayCollection|Collection
    {
        return $this->artists;
    }

    public function addArtist(ArtistType $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
            $artist->setType($this);
        }

        return $this;

    }

    public function removeArtist(ArtistType $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            // set the owning side to null (unless already changed)
            if ($artist->getType() === $this) {
                $artist->setType(null);
            }
        }

        return $this;

    }
}
