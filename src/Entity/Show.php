<?php

namespace App\Entity;

use App\Repository\ShowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ShowRepository::class)]
#[ORM\Table(name: "shows")]
#[UniqueEntity("slug")]
class Show
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $posterUrl = null;

    #[ORM\Column(nullable: true)]
    private ?bool $bookable = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $price = null;

    #[ORM\ManyToOne(targetEntity: Location::class,inversedBy: 'shows')]
    #[ORM\JoinColumn(onDelete: "RESTRICT")]
    private ?location $location = null;

    #[ORM\OneToMany(mappedBy: 'the_show', targetEntity: Representation::class, orphanRemoval: true)]
    private Collection $representations;

    #[ORM\ManyToMany(targetEntity: ArtistType::class, inversedBy: 'shows')]
    private Collection $artistTypes;

    public function __construct()
    {
        $this->representations = new ArrayCollection();
        $this->artistTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPosterUrl(): ?string
    {
        return $this->posterUrl;
    }

    public function setPosterUrl(?string $posterUrl): self
    {
        $this->posterUrl = $posterUrl;

        return $this;
    }


    public function isBookable(): ?bool
    {
        return $this->bookable;
    }

    public function setBookable(?bool $bookable): self
    {
        $this->bookable = $bookable;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLocation(): ?location
    {
        return $this->location;
    }

    public function setLocation(?location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Representation>
     */
    public function getRepresentations(): Collection
    {
        return $this->representations;
    }

    public function addRepresentation(Representation $representation): self
    {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setTheShow($this);
        }

        return $this;
    }

    public function removeRepresentation(Representation $representation): self
    {
        if ($this->representations->removeElement($representation)) {
            // set the owning side to null (unless already changed)
            if ($representation->getTheShow() === $this) {
                $representation->setTheShow(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ArtistType>
     */
    public function getArtistTypes(): Collection
    {
        return $this->artistTypes;
    }

    public function addArtistType(ArtistType $artistType): self
    {
        if (!$this->artistTypes->contains($artistType)) {
            $this->artistTypes->add($artistType);
        }

        return $this;
    }

    public function removeArtistType(ArtistType $artistType): self
    {
        $this->artistTypes->removeElement($artistType);

        return $this;
    }




}
