<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 12/04/2018
 * Time: 13:35
 */

class BlackjackController extends BaseController
{
    public function Bet()
    {
        $context = new BlackJackContext();

        $context->setGameState('Bet');

        Session::set('context', $context);

        return View::make('blackjack.GameView', ['context' => $context]);
    }

    public function PostBet()
    {
        $aposta =  Post::get('BetInput');

        $context = Session::get('context');

        $context->SetBet($aposta);

        $deck = new Deck();

        $userHand = new Hand();

        $serverHand = new Hand();

        $userHand->addToHand($deck->dealCards(2));

        $serverHand->addToHand($deck->dealCards(2));

        $context->setGameState('Hit');

        $context->setDeck($deck);

        $context->UserName = $userHand;

        $context->setServerHand($serverHand);

        $context->setPlayerHand($userHand);

        Session::set('context',$context);

        return View::make('blackjack.GameView', ['context' => $context]);
    }

    public function Hit()
    {

    }

    public function Stand()
    {

    }
}