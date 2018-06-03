<?php


use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 27-04-2018
 * Time: 11:41
 */
class BlackJackHandEvaluator
{

    public function evaluateHand(Hand $hand ){

        $FinalValue = 21;
        foreach ($hand->getHand() as $h)
        {

            $num = substr($h,1);



            Tracy\Debugger::barDump($num,'num');

        }





    }



}