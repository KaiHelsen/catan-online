<?php

namespace App\Entity;

use App\Repository\TileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TileRepository::class)
 */
class Tile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasRobber;

    /**
     * @ORM\ManyToOne(targetEntity=Lobby::class, inversedBy="tiles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lobby;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
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

    public function getHasRobber(): ?bool
    {
        return $this->hasRobber;
    }

    public function setHasRobber(bool $hasRobber): self
    {
        $this->hasRobber = $hasRobber;

        return $this;
    }

    public function getLobby(): ?Lobby
    {
        return $this->lobby;
    }

    public function setLobby(?Lobby $lobby): self
    {
        $this->lobby = $lobby;

        return $this;
    }
}
