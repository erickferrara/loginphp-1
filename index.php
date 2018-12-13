<?php
// Conexão com o banco de dados
require_once 'db_connect.php';

//Botão enviar
if(isset($_POST['entrar'])){
    $erros = array();
   
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Praticando login</title>
</head>
<body>
    <div class="login-box">
        <h1>Login</h1>
        <form action="" method="POST">
        <div class="txt-box">
            <i class="fa fa-user"></i>
            <input type="text" placeholder="Usuário" name="login" />
        </div>

        <div class="txt-box">
            <i class="fa fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha" />
        </div>

        <?php
        
        ?>

        <button class="btn" type="submit" name="entrar">Entrar</button>
        </form>
    </div>
</body>
</html>