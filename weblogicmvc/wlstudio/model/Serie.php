<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 11/05/2018
 * Time: 09:32
 */

class Serie extends ActiveRecord\Model
{
    static $validacao = array(
        array('nome', 'message' => 'Tem de indicar o nome da série'),
        array('descricao', 'message' => 'Tem que inserir uma descricão para a série'),
        array('ntemporadas', 'message' => 'Tem de inserir o número de temporadas')
    );
}