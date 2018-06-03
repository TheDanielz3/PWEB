<?php
namespace NamespaceTest;

class Book_ extends \ActiveRecord\Model
{
	static $belongs_to = array(array('parent_book', 'class_name' => __CLASS__));
}
?>