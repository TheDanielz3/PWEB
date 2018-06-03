<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 27-04-2018
 * Time: 11:50
 */
class Deck
{
    protected $_deck = [];

    public function __construct()
    {
        $this->openDeck();
        $this->shuffleDeck();
        $this->optimizeDeck();
    }

    protected function openDeck()
    {

        //load cards in _deck

        //for diamonds

        for ($i = 2; $i <= 14; $i++){
            array_push($this->_deck, ('D' . $i));

        }

        //for clubs
        for ($i = 2; $i <= 14; $i++){
            array_push($this->_deck, ('C' . $i));
        }

        //for hearts
        for ($i = 2; $i <= 14; $i++){
            array_push($this->_deck, ('H' . $i));
        }

        //for spades
        for ($i = 2; $i <= 14; $i++){
            array_push($this->_deck, ('S' . $i));
        }

    }

    protected function optimizeDeck(){

        return array_splice($this->_deck, 15, 42, null);

    }

    protected function shuffleDeck(){
       shuffle($this->_deck);
    }


    /**
     * @return array
     */
    public function getDeck()
    {
        return $this->_deck;
    }

    /**
     * @param $numCards number of cards to deal
     * @return array
     */
    public function dealCards($numCards) {

        return array_splice($this->_deck, 0, $numCards);

    }



}