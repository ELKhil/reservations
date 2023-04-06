<?php

namespace App\Entity;

use App\Repository\RepresentationUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationUserRepository::class)]
class RepresentationUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?users $user = null;

    #[ORM\ManyToOne]
    private ?representations $representation = null;

    #[ORM\Column(nullable: true)]
    private ?int $places = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?users
    {
        return $this->user;
    }

    public function setUser(?users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRepresentation(): ?representations
    {
        return $this->representation;
    }

    public function setRepresentation(?representations $representation): self
    {
        $this->representation = $representation;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(?int $places): self
    {
        $this->places = $places;

        return $this;
    }
}
