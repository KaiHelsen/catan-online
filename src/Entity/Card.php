<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $functionality;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="cards")
     */
    private $heldBy;

    /**
     * @ORM\ManyToOne(targetEntity=Lobby::class, inversedBy="cards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lobby;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFunctionality(): ?int
    {
        return $this->functionality;
    }

    public function setFunctionality(int $functionality): self
    {
        $this->functionality = $functionality;

        return $this;
    }

    public function getHeldBy(): ?Player
    {
        return $this->heldBy;
    }

    public function setHeldBy(?Player $heldBy): self
    {
        $this->heldBy = $heldBy;

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
