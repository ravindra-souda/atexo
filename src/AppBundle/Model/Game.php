<?php

namespace AppBundle\Model;

use Exception;

class Game
{

    /**
     * Hex representation of unicode characters (eg 'Carreaux' type cards have an unicode beginning with '1F0C')
     */
    const SUITS = [
        '1F0C', '1F0B', '1F0A', '1F0D'
    ];

    /**
     * Hex representation of unicode characters (without 'C' which is a not needed card)
     */
    const RANKS = [
        '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'D', 'E'
    ];

    /**
     * Initialize the deck of 52 cards and shuffle it
     * @return array
     */
    private static function getShuffledDeck(): array
    {
        $deck = range(0, 51);
        shuffle($deck);
        return $deck;
    }

    /**
     * Get a hand of 10 cards from the shuffled deck
     * @return array
     */
    public static function getHand(): array
    {
        return array_slice(self::getShuffledDeck(), 0, 10);
    }

    /**
     * Each card has an integer value, return an array with its corresponding unicode character and card color
     * (eg 42 = ['name' => '🃔', 'color' => 'black'])
     * @param int $value
     * @return array
     * @throws Exception
     */
    public static function getCardNameWithColor(int $value): array
    {
        if (!in_array($value, range(0, 51))) {
            throw new Exception('invalid card value, must be in range 0-51');
        }
        $suit = self::SUITS[intdiv($value, 13)];
        $rank = self::RANKS[($value % 13)];

        return [
            'name' => mb_convert_encoding('&#x'.$suit.$rank.';', 'UTF-8', 'HTML-ENTITIES'),
            'color' => $value < 26 ? 'darkred' : 'black'
        ];
    }
}
