<?php

namespace App\Entity;

use App\Repository\LobbyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LobbyRepository::class)
 */
class Lobby
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Player::class, inversedBy="lobby", cascade={"persist", "remove"})
     */
    private $hasBiggestArmy;

    /**
     * @ORM\OneToOne(targetEntity=Player::class, cascade={"persist", "remove"})
     */
    private $hasLongestRoad;

    /**
     * @ORM\OneToOne(targetEntity=Player::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $activePlayer;

    /**
     * @ORM\OneToMany(targetEntity=Node::class, mappedBy="lobbyId", orphanRemoval=true)
     */
    private $nodes;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="lobby")
     */
    private $players;

    /**
     * @ORM\OneToMany(targetEntity=Card::class, mappedBy="lobby", orphanRemoval=true)
     */
    private $cards;

    /**
     * @ORM\OneToMany(targetEntity=Tile::class, mappedBy="lobby", orphanRemoval=true)
     */
    private $tiles;

    public function __construct()
    {
        $this->nodes = new ArrayCollection();
        $this->players = new ArrayCollection();
        $this->cards = new ArrayCollection();
        $this->tiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHasBiggestArmy(): ?Player
    {
        return $this->hasBiggestArmy;
    }

    public function setHasBiggestArmy(?Player $hasBiggestArmy): self
    {
        $this->hasBiggestArmy = $hasBiggestArmy;

        return $this;
    }

    public function getHasLongestRoad(): ?Player
    {
        return $this->hasLongestRoad;
    }

    public function setHasLongestRoad(?Player $hasLongestRoad): self
    {
        $this->hasLongestRoad = $hasLongestRoad;

        return $this;
    }

    public function getActivePlayer(): ?Player
    {
        return $this->activePlayer;
    }

    public function setActivePlayer(Player $activePlayer): self
    {
        $this->activePlayer = $activePlayer;

        return $this;
    }

    /**
     * @return Collection|Node[]
     */
    public function getNodes(): Collection
    {
        return $this->nodes;
    }

    public function addNode(Node $node): self
    {
        if (!$this->nodes->contains($node)) {
            $this->nodes[] = $node;
            $node->setLobby($this);
        }

        return $this;
    }

    public function removeNode(Node $node): self
    {
        if ($this->nodes->removeElement($node)) {
            // set the owning side to null (unless already changed)
            if ($node->getLobby() === $this) {
                $node->setLobby(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setLobby($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getLobby() === $this) {
                $player->setLobby(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Card[]
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Card $card): self
    {
        if (!$this->cards->contains($card)) {
            $this->cards[] = $card;
            $card->setLobby($this);
        }

        return $this;
    }

    public function removeCard(Card $card): self
    {
        if ($this->cards->removeElement($card)) {
            // set the owning side to null (unless already changed)
            if ($card->getLobby() === $this) {
                $card->setLobby(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tile[]
     */
    public function getTiles(): Collection
    {
        return $this->tiles;
    }

    public function addTile(Tile $tile): self
    {
        if (!$this->tiles->contains($tile)) {
            $this->tiles[] = $tile;
            $tile->setLobby($this);
        }

        return $this;
    }

    public function removeTile(Tile $tile): self
    {
        if ($this->tiles->removeElement($tile)) {
            // set the owning side to null (unless already changed)
            if ($tile->getLobby() === $this) {
                $tile->setLobby(null);
            }
        }

        return $this;
    }
}
