<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\True_;

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

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: ArtistType::class, orphanRemoval: true)]
    private $artists;

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
     * @return ArtistType[]|ArrayCollection
     */
    public function getArtists()
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
