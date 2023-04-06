<?php

namespace App\Entity;

use App\Repository\ArtisteTypeShowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeShowRepository::class)]
class ArtisteTypeShow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?artisteType $artisteType = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?shows $show = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return artisteType|null
     */
    public function getArtisteType(): ?artisteType
    {
        return $this->artisteType;
    }

    /**
     * @param artisteType|null $artisteType
     */
    public function setArtisteType(?artisteType $artisteType): void
    {
        $this->artisteType = $artisteType;
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


}