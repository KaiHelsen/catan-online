<?php

namespace App\Entity;

use App\Repository\RoadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoadRepository::class)
 */
class Road
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Player::class, inversedBy="roads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Player;

    /**
     * @ORM\ManyToOne(targetEntity=Node::class, inversedBy="roads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $position1;

    /**
     * @ORM\ManyToOne(targetEntity=Node::class, inversedBy="roads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $position2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPlaced;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?Player
    {
        return $this->Player;
    }

    public function setPlayer(?Player $Player): self
    {
        $this->Player = $Player;

        return $this;
    }

    public function getPosition1(): ?Node
    {
        return $this->position1;
    }

    public function setPosition1(?Node $position1): self
    {
        $this->position1 = $position1;

        return $this;
    }

    public function getPosition2(): ?Node
    {
        return $this->position2;
    }

    public function setPosition2(?Node $position2): self
    {
        $this->position2 = $position2;

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
}
