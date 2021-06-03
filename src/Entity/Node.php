<?php

namespace App\Entity;

use App\Repository\NodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NodeRepository::class)
 */
class Node
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Lobby::class, inversedBy="nodes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lobby;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="nodes")
     */
    private $player;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isPlaced;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCity;

    /**
     * @ORM\OneToMany(targetEntity=Road::class, mappedBy="position1", orphanRemoval=true)
     */
    private $roads;

    public function __construct()
    {
        $this->roads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }



    public function getIsPlaced(): ?bool
    {
        return $this->isPlaced;
    }

    public function setIsPlaced(bool $isPlaced): self
    {
        $this->isPlaced = $isPlaced;

        return $this;
    }

    public function getIsCity(): ?bool
    {
        return $this->isCity;
    }

    public function setIsCity(?bool $isCity): self
    {
        $this->isCity = $isCity;

        return $this;
    }

    /**
     * @return Collection|Road[]
     */
    public function getRoads(): Collection
    {
        return $this->roads;
    }

    public function addRoad(Road $road): self
    {
        if (!$this->roads->contains($road)) {
            $this->roads[] = $road;
            $road->setPosition1($this);
        }

        return $this;
    }

    public function removeRoad(Road $road): self
    {
        if ($this->roads->removeElement($road)) {
            // set the owning side to null (unless already changed)
            if ($road->getPosition1() === $this) {
                $road->setPosition1(null);
            }
        }

        return $this;
    }
}
