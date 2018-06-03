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
    private $playerHandValue;


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
    public function setPlayerHandValue($playerHand)
    {
        $value=0;

        foreach ($playerHand->getHand() as $card )
        {


            $value+=(int)substr($card,1);

        }

        $this->playerHandValue = $value;
    }
    public function getPlayerHandValue()
    {
        return  $this->playerHandValue;
    }

    public function setServerHandValue($serverHand)
    {
        $value=0;

        foreach ($serverHand->getHand() as $card )
        {


            $value+=(int)substr($card,1);

        }

        $this->serverHandValue = $value;
    }
    public function getServerHandValue()
    {
        return  $this->serverHandValue;
    }



}