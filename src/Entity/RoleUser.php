<?php

namespace App\Entity;

use App\Repository\RoleUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleUserRepository::class)]
class RoleUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?roles $role = null;

    #[ORM\ManyToOne]
    private ?users $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?roles
    {
        return $this->role;
    }

    public function setRole(?roles $role): self
    {
        $this->role = $role;

        return $this;
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



}
