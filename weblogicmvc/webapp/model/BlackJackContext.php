<?php
/**
 * Created by PhpStorm.
 * User: JoanaPedrosa
 * Date: 27/04/2018
 * Time: 11:48
 */

class BlackJackContext
{

    private $deck;
    private $playerHand;
    private $ServerHand;
    private $bet;
    private $gameState;

    /**
     * @return mixed
     */
    public function getGameState()
    {
        return $this->gameState;
    }

    /**
     * @param mixed $gameState
     */
    public function setGameState($gameState)
    {
        $this->gameState = $gameState;
    }


    /**
     * @return mixed
     */
    public function getPlayerHand()
    {
        return $this->playerHand;
    }

    /**
     * @param mixed $playerHand
     */
    public function setPlayerHand($playerHand)
    {
        $this->playerHand = $playerHand;
    }

    /**
     * @return mixed
     */
    public function getServerHand()
    {
        return $this->ServerHand;
    }

    /**
     * @param mixed $ServerHand
     */
    public function setServerHand($ServerHand)
    {
        $this->ServerHand = $ServerHand;
    }

    /**
     * @return mixed
     */
    public function getBet()
    {
        return $this->bet;
    }

    /**
     * @param mixed $bet
     */
    public function setBet($bet)
    {
        $this->bet = $bet * 2;
    }

    /**
     * @return mixed
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * @param mixed $deck
     */
    public function setDeck($deck)
    {
        $this->deck = $deck;
    }






}