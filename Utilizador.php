<?php


class Utilizador{

    //Atributos
    public $nome;
    public $senha;
    public $idade;
    public $altura;
    public $peso;
    

    //Construtor
    function __construct($nome, $senha, $idade, $altura, $peso){
        $this->nome = $nome;
        $this->senha = $senha;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->peso = $peso;
    }

}


?>