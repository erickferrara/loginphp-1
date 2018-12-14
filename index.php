<?php
// Conexão com o banco de dados
require_once 'db_connect.php';

// Sessão
session_start();

//Botão enviar
if(isset($_POST['entrar'])){
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($login) || empty($senha)){
        $erros[] = "Por favor, preencha os campos para efetuar login.";
    }else{
        $sql = "SELECT login FROM usuarios WHERE login = '$login' ";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0){
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1){
                $erro[] = "deu certo";
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: home.php');
            }else{
                $erros[] = "Login ou senha incorretos.";
            }
        }else{
            $erros[] = "Usuário inexistente.";
        }
    }
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

        <div class="erro">
        <?php
            if(!empty($erros)){
                foreach($erros as $erro){
                    echo "<li>" . $erro . "</li>";
                }
            }
        ?>
        </div>

        <button class="btn" type="submit" name="entrar">Entrar</button>
        </form>
    </div>
</body>
</html>