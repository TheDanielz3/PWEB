<?php
/**
 * Created by PhpStorm.
 * User: danielz3
 * Date: 15/05/2018
 * Time: 16:29
 */

class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username','message'=>'What? You dont need a username?'),
        array('nomecompleto','message'=>'Need put a name'),
        array('pwd','message'=>'Put a password'),
        array('email','message'=>'Need add a email'),
        array('datanasc','message'=>'You are a zombie and dont have age?'),
        array('usertype'),
        array('locked')
    );


}