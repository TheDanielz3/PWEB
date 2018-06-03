<?php
use ActiveRecord\Model;

class User extends Model
{
    static $validates_presence_of = array(
        array('username','message' => 'Deve Preencher o Username'),
        array('nome','message' => 'Deve Preencher o Nome'),
        array('datanascimento','message' => 'Deve Preencher a  data de nascimento'),
        array('email','message' => 'Deve Preencher o email'),
        array('password','message' => 'Deve Preencher a password')
    );
}


