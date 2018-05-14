<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 27-04-2018
 * Time: 11:40
 */
class CardTestController extends BaseController
{

    public function index(){


        //index iniciar jogo
    $game = new BlackJackContext();
    $game->setBet(100);
    $deck = new Deck();

    \Tracy\Debugger::barDump($deck->getDeck(), 'BlackJack Before Deal');
    //distribuir cartas
    $userhand = new Hand();

    $userhand->addToHand($deck->dealCards(2));

    $serverhand = new Hand();
    $serverhand->addToHand($deck->dealCards(2));


    //card - pedir mais uma carta

    \Tracy\Debugger::barDump($userhand, 'User Hand');
      \Tracy\Debugger::barDump($serverhand, 'Server Hand');

     \Tracy\Debugger::barDump($deck->getDeck(), 'BlackJack After Deal');

     $userhand->addToHand( $deck->dealCards(1));
        $serverhand->addToHand( $deck->dealCards(1));



     $game->setDeck($deck);
     $game->setPlayerHand($userhand);
    $game->setServerHand($serverhand);


        \Tracy\Debugger::barDump($game, 'BlackJack env');
        //Session::set($game);

   


    }


}