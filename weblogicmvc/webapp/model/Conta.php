<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 15/05/2018
 * Time: 21:50
 */

class Conta extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('datahora'),
        array('tipolancamento', 'message'=>'Indique o tipo de lançamento'),
        array('credito','message'=>'Indique o valor de crédito'),
        array('debito'),
        array('descricao'),
        array('iduser')
    );
}