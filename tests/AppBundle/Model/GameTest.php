<?php

namespace Tests\AppBundle\Util;

use AppBundle\Model\Game;
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
        $this->assertEquals(['name' => '🃁', 'color' => 'darkred'], Game::getCardNameWithColor(0));
        $this->assertEquals(['name' => '🃔', 'color' => 'black'], Game::getCardNameWithColor(42));
        $this->assertEquals(['name' => '🃞', 'color' => 'black'], Game::getCardNameWithColor(51));

        $this->expectExceptionMessage('invalid card value, must be in range 0-51');
        Game::getCardNameWithColor(666);
    }
}
