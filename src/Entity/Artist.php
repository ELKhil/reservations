<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
#[ORM\Table(name: "artists")]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage : "Your firstname must be at least {{ limit }} characters long",
        maxMessage : "Your lastname can't be lounger than {{ limit }} characters",
    )]
    private ?string $firstname = null;

    #[ORM\Column(length: 60, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: 'Your lastname must be at least {{ limit }} characters long',
        maxMessage: 'Your lastname cannot be longer than {{ limit }} characters',
    )]
    private ?string $lastname = null;

    #[ORM\OneToMany(mappedBy: 'artist', targetEntity: ArtistType::class, orphanRemoval: true)]
    private $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }


    public function addType(ArtistType $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
            $type->setArtist($this);
        }

        return $this;

    }

    /**
     * @return ArtistType[]|ArrayCollection
     */
    public function getTypes()
    {
        return $this->types;
    }



    public function removeType(ArtistType $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getArtist() === $this) {
                $type->setArtist(null);
            }
        }
        return $this;

    }
}
