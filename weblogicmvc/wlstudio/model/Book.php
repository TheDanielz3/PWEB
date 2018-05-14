<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-05-2016
 * Time: 14:16
 */
class Book extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('name'),
        array('isbn', 'message' => 'YooaaH it must be provided')
    );


}
