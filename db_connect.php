<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistemalogin";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_error()){
    echo "Erro na conexão: " . mysqli_connect_error();
}
?>