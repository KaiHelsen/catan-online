<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $victoryPoints;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $colour;

    /**
     * @ORM\Column(type="integer")
     */
    private $knightsPlayed;

    /**
     * @ORM\Column(type="integer")
     */
    private $brick;

    /**
     * @ORM\Column(type="integer")
     */
    private $ore;

    /**
     * @ORM\Column(type="integer")
     */
    private $lumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $grain;

    /**
     * @ORM\Column(type="integer")
     */
    private $wool;

    /**
     * @ORM\OneToMany(targetEntity=Node::class, mappedBy="playerId")
     */
    private $nodes;

    /**
     * @ORM\ManyToOne(targetEntity=Lobby::class, inversedBy="players")
     */
    private $lobby;

    /**
     * @ORM\OneToMany(targetEntity=Road::class, mappedBy="PlayerId", orphanRemoval=true)
     */
    private $roads;

    /**
     * @ORM\OneToMany(targetEntity=Card::class, mappedBy="heldBy")
     */
    private $cards;


    public function __construct()
    {
        $this->nodes = new ArrayCollection();
        $this->roads = new ArrayCollection();
        $this->cards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getVictoryPoints(): ?int
    {
        return $this->victoryPoints;
    }

    public function setVictoryPoints(int $victoryPoints): self
    {
        $this->victoryPoints = $victoryPoints;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    public function getKnightsPlayed(): ?int
    {
        return $this->knightsPlayed;
    }

    public function setKnightsPlayed(int $knightsPlayed): self
    {
        $this->knightsPlayed = $knightsPlayed;

        return $this;
    }

    public function getBrick(): ?int
    {
        return $this->brick;
    }

    public function setBrick(int $brick): self
    {
        $this->brick = $brick;

        return $this;
    }

    public function getOre(): ?int
    {
        return $this->ore;
    }

    public function setOre(int $ore): self
    {
        $this->ore = $ore;

        return $this;
    }

    public function getLumber(): ?int
    {
        return $this->lumber;
    }

    public function setLumber(int $lumber): self
    {
        $this->lumber = $lumber;

        return $this;
    }

    public function getGrain(): ?int
    {
        return $this->grain;
    }

    public function setGrain(int $grain): self
    {
        $this->grain = $grain;

        return $this;
    }

    public function getWool(): ?int
    {
        return $this->wool;
    }

    public function setWool(int $wool): self
    {
        $this->wool = $wool;

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
            $node->setPlayer($this);
        }

        return $this;
    }

    public function removeNode(Node $node): self
    {
        if ($this->nodes->removeElement($node)) {
            // set the owning side to null (unless already changed)
            if ($node->getPlayer() === $this) {
                $node->setPlayer(null);
            }
        }

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
            $road->setPlayer($this);
        }

        return $this;
    }

    public function removeRoad(Road $road): self
    {
        if ($this->roads->removeElement($road)) {
            // set the owning side to null (unless already changed)
            if ($road->getPlayer() === $this) {
                $road->setPlayer(null);
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
            $card->setHeldBy($this);
        }

        return $this;
    }

    public function removeCard(Card $card): self
    {
        if ($this->cards->removeElement($card)) {
            // set the owning side to null (unless already changed)
            if ($card->getHeldBy() === $this) {
                $card->setHeldBy(null);
            }
        }

        return $this;
    }

    private const MAX_SETTLEMENTS = 5;
    private const MAX_CITIES = 4;
    private const MAX_ROADS = 15;

    private const PRICE_ORE_FOR_CITY = 3;
    private const PRICE_GRAIN_FOR_CITY = 2;

    private const PRICE_BRICK_FOR_ROAD = 1;
    private const PRICE_LUMBER_FOR_ROAD = 1;

    private const PRICE_BRICK_FOR_SETTLEMENT = 1;
    private const PRICE_LUMBER_FOR_SETTLEMENT = 1;
    private const PRICE_WOOL_FOR_SETTLEMENT = 1;
    private const PRICE_GRAIN_FOR_SETTLEMENT = 1;

    private const PRICE_WOOL_FOR_CARD = 1;
    private const PRICE_GRAIN_FOR_CARD = 1;
    private const PRICE_ORE_FOR_CARD = 1;

    public function availableBuildingsForUser(): array{


        $placedSettlements = 0;
        $placedCities = 0;

        foreach($this->getNodes() as $node) {

            if($node->getPlayer() === $this && $node->getIsCity() === false){

                $placedSettlements ++ ;

            }

            if($node->getPlayer() === $this && $node->getIsCity() === true){

                $placedCities ++;

            }
        }

        $availableSettlements =  self::MAX_SETTLEMENTS - $placedSettlements ;
        $availableCities = self::MAX_CITIES - $placedCities ;

        return array('available_settlements' => $availableSettlements, 'available_cities' => $availableCities);

        }

    public function availableRoadsForUser(): int
    {

        $placedRoads = 0;

        foreach($this->roads as $road){

            if($road->getIsPlaced() === false){

                $placedRoads ++;

            }

        }

        $availableRoads = self::MAX_ROADS - $placedRoads;

        return $availableRoads;

    }

    //@ToDo Check if there is a connection with at least one road (this road can also be placed that same turn)
    //@ToDo check if all 3 of the adjacent intersections are vacant
    public function canPlaceSettlement(Node $node) :bool
    {


        $availableBuildings = $this->availableBuildingsForUser();


        if($availableBuildings['available_settlements']<= 0){
            return false;
        }

        if($this->brick < self::PRICE_BRICK_FOR_SETTLEMENT ||$this->lumber < self::PRICE_LUMBER_FOR_SETTLEMENT
            ||$this->wool < self::PRICE_WOOL_FOR_SETTLEMENT ||$this->grain < self::PRICE_GRAIN_FOR_SETTLEMENT){

            return false;
        }

        if($node->getIsPlaced() === true){
            return false;
        }

            return true;
    }

    public function canPlaceCity(Node $node): bool
    {


        $availableBuildings = $this->availableBuildingsForUser();

        if($availableBuildings['available_cities']<=0){
            return false;
        }

        if($this->ore < self::PRICE_ORE_FOR_CITY || $this->grain < self::PRICE_GRAIN_FOR_CITY ){
            return false;
        }

        if($node->getPlayer() !== $this){
            return false;
        }
        if(!$node->getIsPlaced() || $node->getIsCity() === true){
            return false;
        }

            return true;
    }

    //@ToDO check inside this function if the space is still available based on the nodes.
    // @ToDo check if the new road is connected to a city, settlement or different road.
    public function canPlaceRoad(): bool
    {

        if($this->availableRoadsForUser()<=0){
            return false;
        }

        if($this->brick < self::PRICE_BRICK_FOR_ROAD || $this->lumber < self::PRICE_LUMBER_FOR_ROAD){
            return false;
        }

        return true;


    }

    public function canBuyCard(Lobby $lobby): bool
    {

        if($this->ore < self::PRICE_ORE_FOR_CARD || $this->wool < self::PRICE_WOOL_FOR_CARD || $this->grain < self::PRICE_GRAIN_FOR_CARD){
            return false;
        }

        $availableLobbyCards = 0;

        foreach ($lobby->getCards() as $card){

            if($card->getHeldBy() === null){

                $availableLobbyCards ++;
            }
        }

        if($availableLobbyCards === 0){
            return false;
        }

        return true;

    }






}
