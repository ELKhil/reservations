<?php

namespace App\Entity;

use App\Repository\ArtisteTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeRepository::class)]
class ArtisteType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: artists::class)]
    private Collection $artist;

    #[ORM\ManyToOne(targetEntity: types::class)]
    private Collection $type;

    public function __construct()
    {
        $this->artist = new ArrayCollection();
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function addArtistId(artists $artist): self
    {
        if (!$this->artist->contains($artist)) {
            $this->artist->add($artist);
        }

        return $this;
    }

    public function removeArtistId(artists $artist): self
    {
        $this->artist->removeElement($artist);

        return $this;
    }


    public function addTypeId(types $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
        }

        return $this;
    }

    public function removeTypeId(types $type): self
    {
        $this->type->removeElement($type);

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getArtist(): ArrayCollection|Collection
    {
        return $this->artist;
    }

    /**
     * @param ArrayCollection|Collection $artist
     */
    public function setArtist(ArrayCollection|Collection $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getType(): ArrayCollection|Collection
    {
        return $this->type;
    }

    /**
     * @param ArrayCollection|Collection $type
     */
    public function setType(ArrayCollection|Collection $type): void
    {
        $this->type = $type;
    }




}
