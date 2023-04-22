<?php

namespace App\Entity;

use App\Repository\RepresentationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationRepository::class)]
#[ORM\Table(name:"representations")]
class Representation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Show::class, inversedBy: 'representations', )]
    #[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: false, onDelete: "RESTRICT")]
    private ?Show $the_show = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $schedule = null;

    #[ORM\ManyToOne(targetEntity: Location::class, inversedBy: 'representations')]
    #[ORM\JoinColumn(name: "location_id" , referencedColumnName: "id", onDelete: "RESTRICT")]
    private ?Location $the_location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheShow(): ?Show
    {
        return $this->the_show;
    }

    public function setTheShow(?Show $the_show): self
    {
        $this->the_show = $the_show;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getTheLocation(): ?Location
    {
        return $this->the_location;
    }

    public function setTheLocation(?Location $the_location): self
    {
        $this->the_location = $the_location;

        return $this;
    }
}