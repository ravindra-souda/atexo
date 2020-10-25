<?php

namespace AppBundle\Controller;

use AppBundle\Model\Game;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends Controller
{
    /**
     * @Route("/atexo", name="atexo")
     */
    public function indexAction()
    {
        $myHand = Game::getHand();

        $namedCards = array_map('AppBundle\Model\Game::getCardNameWithColor', $myHand);
        sort($myHand);
        $sortedNamedCards = array_map('AppBundle\Model\Game::getCardNameWithColor', $myHand);

        return $this->render('Game/index.html.twig', [
            'namedCards' => $namedCards,
            'sortedNamedCards' => $sortedNamedCards
        ]);
    }

}