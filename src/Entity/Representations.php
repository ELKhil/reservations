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
    private ?shows $show = null;

    #[ORM\ManyToOne]
    private ?locations $location = null;

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
     * @return shows|null
     */
    public function getShow(): ?shows
    {
        return $this->show;
    }

    /**
     * @param shows|null $show
     */
    public function setShow(?shows $show): void
    {
        $this->show = $show;
    }

    /**
     * @return locations|null
     */
    public function getLocation(): ?locations
    {
        return $this->location;
    }

    /**
     * @param locations|null $location
     */
    public function setLocation(?locations $location): void
    {
        $this->location = $location;
    }




}
