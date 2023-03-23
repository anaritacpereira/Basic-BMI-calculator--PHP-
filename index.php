<!--
    Autor: Ana Rita Pereira
    Data Inicio: 09/01/2023
    Última modificação: 12/01/2023
-->

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("Utilizador.php");

$lista_utilizadores = [
    new Utilizador("Ana", "1234", 31, 1.60, 62),
    new Utilizador("Andre", "1111", 42, 1.62, 72),
    new Utilizador("Bernardo", "4321", 6, 1.20, 20), 
];

global $posicao;

$form = isset($_POST["utilizador"]) && isset($_POST["senha"]) ;
$form_2 = isset($_GET["idade"]) && isset($_GET["peso"]) && isset($_GET["altura"]);

if($form){   
    $utilizador=$_POST["utilizador"];
    $senha=$_POST["senha"];

    $login=false;

    for($i=0; $i<count($lista_utilizadores); $i++){
        if($lista_utilizadores[$i]->nome==$utilizador){
            if($lista_utilizadores[$i]->senha==$senha){
                $login=true;
                $posicao=$i;
                $menorpeso2=number_format(18.5*($lista_utilizadores[$posicao]->altura**2),2);
                $maiorpeso2=number_format(24.9*($lista_utilizadores[$posicao]->altura**2),2);
                $imc2=number_format($lista_utilizadores[$posicao]->peso/($lista_utilizadores[$posicao]->altura**2),2);
                break;
            }
        }
    }

    
}

else if($form_2){
    $idade= $_GET["idade"];
    $peso= $_GET["peso"];
    $altura= $_GET["altura"];

    $menorpeso=number_format(18.5*($altura**2),2);
    $maiorpeso=number_format(24.9*($altura**2),2);
    $imc=number_format($peso/($altura**2),2);

}


function verpeso($imc){
    
    switch($imc){
        case $imc<18.5:
            echo "Baixo Peso";
            break;
        case $imc<25:
            echo "Peso Normal";
            break;
        case $imc<30:
            echo "Excesso de Peso";
            break;
        case $imc>=30:
            echo "Obesidade";
            break;
        case $imc<35:
            echo "Obesidade Grau I (Moderada";
            break;
        case $imc<40:
            echo "Obesidade Grau II (Severa)";
            break;
        case $imc>40:
            echo "Obesidade Grau III (Mórbida)";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI calculator</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <?php if($form): ?>
        <?php if($login): ?>
            <div class="resultado">
                <h1>Olá <?=$lista_utilizadores[$posicao]->nome?>!</h1>
                <br><br>
                <p>
                Como você possui <span style="color:red">(<?=$lista_utilizadores[$posicao]->altura;?> m)</span> de altura, o seu peso 
                ideal está entre <span style="color:green">(<?=$menorpeso2;?> kg)</span> e 
                <span style="color:green">(<?=$maiorpeso2;?> kg)</span>.
                </p>

                <br><br>

                <?php if($lista_utilizadores[$posicao]->idade<18): ?>
                    <p>
                        Entretanto, como você possui apenas <span style="color: red">(<?=$lista_utilizadores[$posicao]->idade;?> anos)</span>, 
                        estes resultados, como também a tabela abaixo, não estão correctos para si. 
                        Deste modo, deve buscar a ajuda de um profissional. 
                    </p>
                <?php else: ?>
                    <p>
                        Neste momento, com o seu peso de <span style="color:red">(<?=$lista_utilizadores[$posicao]->peso;?> kg)</span>, 
                        o seu IMC é de <span style="color:green">(<?=$imc2;?>)</span>,
                        sendo assim classificado como... <span style="color:red">(<?=verpeso($imc2);?>)</span>.
                    </p>
                <?php endif; ?>
                    
                <br><br>
                <img src="tabela.jpg" alt="tabelaimc">
                <br><br>
                <a href="entrada.php"><button> Sair </button></a>
                <br><br>
                
            </div>

        <?php else: ?>

            <h1> Login Inválido! </h1> 
            <a href="entrada.php"> <button> Voltar a tentar! </button></a>
            
        <?php endif; ?>
        
    <?php endif; ?>



    <?php if($form_2): ?>
        <div class="resultado">
            <h1>Olá Visitante!</h1>
            <br><br>
            <p>
                Como você possui <span style="color:red">(<?=$altura;?> m)</span> de altura, o seu peso 
                ideal está entre <span style="color:green">(<?=$menorpeso;?> kg)</span> e 
                <span style="color:green">(<?=$maiorpeso;?> kg)</span>.
            </p>

            <br><br>
            <p>
                Neste momento, com o seu peso de <span style="color:red">(<?=$peso;?> kg)</span>, 
                o seu IMC é de <span style="color:green">(<?=$imc;?>)</span>,
                sendo assim classificado como... <span style="color:red">(<?=verpeso($imc);?>)</span>.
            </p>
            <br><br>
            <img src="tabela.jpg" alt="tabelaimc">
            <br><br>
            <a href="entrada.php"><button> Sair </button></a>
            <br><br>
        </div>
    <?php endif; ?>

</body>
</html>