<!--
    Autor: Ana Rita Pereira
    Data Inicio: 09/01/2023
    Última modificação: 
-->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho 17</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <div class="utilizador">
        <h1> Bem-Vindo </h1>
        <br><br>
        <form action="index.php" method="POST">
            <input type="text" name="utilizador" placeholder="Utilizador" autofocus required="required">
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required="required">
            <br><br>
            <br><br>
            <input type="submit" value="Entrar">
            <br><br>
        </form>
    </div>

    <br><br>

    <div class="visitante">
        <h1> Visitante </h1>
        <form action="index.php">
            <input type="number" name="idade" placeholder="Idade" min="18" required="required">
            <br><br>
            <input type="number" name="peso" placeholder="Peso em Kg" min="0" step="0.1" required="required">
            <br><br>
            <input type="number" name="altura" placeholder="Altura em m" min="0" step="0.01" required="required">
            <br><br><br>
            <input type="submit" value="Entrar como Visitante">
            <br><br>
        </form>
    </div>
</body>
</html>