<?php

class Currentaccount extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('saldo'),
        array('id_username'),
        array('tipo'),
        array('descricao'),
        array('credito'),
        array('debito'),

    );
}
