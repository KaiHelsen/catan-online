<?php


namespace App\Tests;
use App\Entity\Lobby;
use App\Entity\Node;
use App\Entity\Player;
use PHPUnit\Framework\TestCase;


class CheckAvailableBuildingsTest extends TestCase
{



    public function testCanPlaceSettlement(){

        $player = new Player();
        $node = new Node();
        $node->setIsPlaced(0);


        self::assertTrue($player->canPlaceSettlement( $node));

    }

    public function testCanPlaceCity(){

        $player = new Player();
        $node = new Node();
        $node->setIsPlaced(1);
        $node->setIsCity(0);
        $node->setPlayer($player);

        self::assertTrue($player->canPlaceCity( $node));

    }




}
