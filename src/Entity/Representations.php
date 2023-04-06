<?php

namespace App\Entity;

use App\Repository\RepresentationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationsRepository::class)]
class Representations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $whene = null;

    #[ORM\ManyToOne]
    private ?Show $show = null;

    #[ORM\ManyToOne]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWhene(): ?\DateTimeInterface
    {
        return $this->whene;
    }

    public function setWhene(\DateTimeInterface $whene): self
    {
        $this->whene = $whene;

        return $this;
    }

    /**
     * @return Show|null
     */
    public function getShow(): ?Show
    {
        return $this->show;
    }

    /**
     * @param Show|null $show
     */
    public function setShow(?Show $show): void
    {
        $this->show = $show;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }




}
