<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
?>

<?php


// Verifica banco de dados e message.php

require_once 'db-connect.php';
require_once '/var/www/html/loja/includes/message.php';

// Verificação se o usuário esta logado
if(!isset($_SESSION['logado'])):
    header('Location: login/index.php');
endif;



function clear($input) {
    global $connect;
    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-cadastrar'])):
    $nome = clear($_POST['nome']);
    $preco = clear($_POST['preco']);
    $descricao = clear($_POST['descricao']);
    $query = "insert into produto (nome, preco, descricao) values ('{$nome}', '{$preco}', '{$descricao}')";

    if(mysqli_query($connect, $query)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../index.php');
    endif;
endif;