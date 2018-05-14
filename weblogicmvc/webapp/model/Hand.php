<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 27-04-2018
 * Time: 11:55
 */
class Hand
{

    protected $_hand = [];

    /**
     * @param array $hand
     */



    public function addToHand(array $newCards){

        foreach ($newCards as $card){
            array_push( $this->_hand, $card);
        }


    }

    /**
     * @return array
     */
    public function getHand(): array
    {
        return $this->_hand;
    }


}