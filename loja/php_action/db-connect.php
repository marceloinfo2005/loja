<?php
// Conexão com banco de dados
$servername = "localhost";
$username = "admin";
$password = "admin4321";
$db_name = "loja";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8"); //define o ajuste de caracteres no banco de dados.

if(mysqli_connect()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;


