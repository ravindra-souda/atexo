<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testHas10CardsOnHand(): void
    {
        $this->assertCount(10, Game::getHand());
    }

    public function testHas10ValidCardsOnHands(): void
    {
        foreach(Game::getHand() as $card) {
            $this->assertGreaterThanOrEqual(0, $card);
            $this->assertLessThanOrEqual(51, $card);
        }
    }

    public function testGetCorrectCardName(): void
    {
        $this->assertEquals('As de Carreaux', Game::getCardName(0));
        $this->assertEquals('4 de Trèfle', Game::getCardName(42));
        $this->assertEquals('Roi de Trèfle', Game::getCardName(51));

        $this->expectExceptionMessage('invalid card value, must be in range 0-51');
        Game::getCardName(666);
    }
}
