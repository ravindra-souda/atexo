<?php

class Game
{
    const SUITS = [
        'Carreaux', 'Coeur', 'Pique', 'Trèfle'
    ];

    const RANKS = [
        'As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi'
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
     * Each card has an integer value, return its name in french (eg 42 = '4 de Trèfle')
     * @param int $value
     * @return string
     * @throws Exception
     */
    public static function getCardName(int $value): string
    {
        if (!in_array($value, range(0, 51))) {
            throw new Exception('invalid card value, must be in range 0-51');
        }
        $suit = self::SUITS[intdiv($value, 13)];
        $rank = self::RANKS[($value % 13)];

        return "{$rank} de {$suit}";
    }

    /**
     * Entry point of application
     */
    public static function play(): void
    {
        $myHand = self::getHand();

        echo "\n\nVotre main non triée:\n\n";
        print_r(array_map('self::getCardName', $myHand));

        sort($myHand);
        echo "\n\nVotre main triée:\n\n";
        print_r(array_map('self::getCardName', $myHand));
    }
}
