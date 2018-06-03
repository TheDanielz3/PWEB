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

    public function index()
    {


        $bet = Session::get('bet');

        //index iniciar jogo
        $game = new BlackJackContext();
        $game->setBet($bet);
        $deck = new Deck();



        //distribuir cartas
        $userhand = new Hand();

        $userhand->addToHand($deck->dealCards(2));

        $serverhand = new Hand();
        $serverhand->addToHand($deck->dealCards(2));


        $game->setDeck($deck);
        $game->setPlayerHand($userhand);
        $game->setServerHand($serverhand);

        $game->setServerHandValue($serverhand);
        $game->setPlayerHandValue($userhand);
        \Tracy\Debugger::barDump($game, 'BlackJack env');
        Session::set('game', $game);

        View::make('home.game');


    }

    public function pedircarta()
    {

        $game = Session::get('game');

        $userhand = $game->getPlayerHand();
        $serverhand = $game->getServerHand();
        $deck = $game->getDeck();



        $userhand->addToHand($deck->dealCards(1));
        $serverhand->addToHand($deck->dealCards(1));

        $game->setDeck($deck);
        $game->setPlayerHand($userhand);
        $game->setServerHand($serverhand);
        $game->setPlayerHandValue($userhand);

        Session::set('game', $game);

        View::make('home.game');

    }
    public function PlayerLose(){
        $bet = Session::get('bet');


        $user = Session::get('user');
        $sessionaccount = Session::get('currentaccount');
        $currentaccount2 = Currentaccount::find_by_id_username($user->id);






        $currentaccount = new Currentaccount();

        $currentaccount->saldo = $sessionaccount->saldo -$bet;
        $currentaccount->tipo = "los";
        $currentaccount->descricao = "Perdeu ".$bet." Creditos";
        $currentaccount->credito = 0;
        $currentaccount->debito = $bet;
        $currentaccount->id_username = $user->id;

        \Tracy\Debugger::barDump($currentaccount2->credito, 'debito');

            if($currentaccount->is_valid()){

                $currentaccount->save();
                Session::set('currentaccount', $currentaccount);

                Session::set('bet',0);
                Session::set('Status', "Perdeu");
                Redirect::toRoute('home/game');

            } else {

                // return form with data and errors
                Redirect::flashToRoute('home/game', ['user' => $currentaccount]);
            }
    }

    public function ServerLose(){
        $bet = Session::get('bet');

        $user = Session::get('user');

        $bet=$bet*2;

        $sessionaccount = Session::get('currentaccount');
        $currentaccount2 = Currentaccount::find_by_id_username($user->id);

        $currentaccount = new Currentaccount();

        $currentaccount->saldo = $sessionaccount->saldo + $bet;
        $currentaccount->tipo = "win";
        $currentaccount->descricao = "Ganhou ".$bet." Creditos";
        $currentaccount->credito = $bet;
        $currentaccount->debito = 0;
        $currentaccount->id_username = $user->id;

        \Tracy\Debugger::barDump($currentaccount2->credito, 'debito');

        if($currentaccount->is_valid()){

            $currentaccount->save();
            Session::set('bet',0);
            Session::set('currentaccount', $currentaccount);
            Session::set('Status', "Ganhou");

            Redirect::toRoute('home/game');

        } else {

            // return form with data and errors
            Redirect::flashToRoute('home/game', ['user' => $currentaccount]);
        }
    }
    public function check(){
        $playerhandvalue = Session::get('playerhandvalue');
        $serverhandvalue = Session::get('serverhandvalue');

        if($playerhandvalue>=$serverhandvalue){

            Redirect::toRoute('game/ServerLose');



        }elseif($playerhandvalue<$serverhandvalue){

            Redirect::toRoute('game/PlayerLose');

        }

    }

}

