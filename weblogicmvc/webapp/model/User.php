<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 15/05/2018
 * Time: 21:50
 */

class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username','message'=>'Please insert a valid username?'),
        array('nomecompleto','message'=>'Insert your full name please'),
        array('pwd','message'=>'Define a password please'),
        array('email','message'=>'Add your email address please'),
        array('datanasc','message'=>'Insert your birth date please'),
        array('usertype'),
        array('locked')
    );
}