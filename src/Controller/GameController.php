<?php

namespace App\Controller;

use App\Service\DiceRoll;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    private const ROBBER_TRIGGER = 7;

    #[Route('/game', name: 'game')]
    public function index(Session $session): Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
            'roll' => $session->get('diceRoll')
        ]);
    }

    #[Route('/roll-dice', name: 'roll_dice', methods: ['post'])]
    public function rollDice(DiceRoll $roll, Session $session): RedirectResponse
    {
        $session->set('diceRoll', $roll);
        if ($roll->getRollTotal() === self::ROBBER_TRIGGER)
        {
            // TODO replace with redirect that handles the robber
            return $this->redirectToRoute('game');
        }
        // TODO replace with redirect that handles resource distribution and furthers player turn
        return $this->redirectToRoute('game');
    }
}
