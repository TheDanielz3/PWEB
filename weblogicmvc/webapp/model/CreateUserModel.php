<!--Projeto Blackjack-->
<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 13/05/2018
 * Time: 13:22
 */

class CreateUserModel
{
    public $nome = "";
    public $username = "";
    public $pwd = "";
    public $datanascimento = "";
    public $email = "";
    public $usertype = "";

    function __construct($nome, $username, $pwd, $datanascimento, $email, $usertype)
    {
        $this->nome = $nome;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->datanascimento = $datanascimento;
        $this->email = $email;
        $this->usertype = $usertype;
    }

    public function createUser()
    {
        $nome = $_POST['nome'];
        $datanascimento = $_POST['dnasc'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $email = $_POST['username'];
        $locked = date('Y') - $datanascimento;
        $usertype = $_POST['usertype'];

        $servername = "localhost";
        $serveruser = "root";
        $password = "";
        $dbname = "projetoblackjack";

        //Verificação de idade, para então abrir ligação mysql
        if($locked >= 18) {
            $ligacao = new mysqli($servername, $serveruser, $password, $dbname);
            //Verificar ligação
            if($ligacao->connect_error)
            {
                die("Connection failed: " . $ligacao->connect_error);
            }
            else
            {
                //Inserir na base de dados input do form
                $inputdata = "INSERT INTO projetoblackjack(nomecompleto, datanasc, email, username, password, usertype) 
                VALUES ('$username', '$pwd', '$nome', '$datanascimento', '$email', '$usertype')";

                $newuser = $ligacao->query($inputdata);
            }
        } else {
            echo '<script>';
            echo 'alert("Tem de ter 18 anos ou mais para poder jogar Blackjack")';
            echo '</script>';
        }
    }
}