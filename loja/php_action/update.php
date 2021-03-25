<?php
session_start();

require_once 'db-connect.php';

if(isset($_POST['btn-editar'])):
      $nome = mysqli_escape_string($connect, $_POST['nome']);
      $preco  = mysqli_escape_string($connect, $_POST['preco']);

      $id = mysqli_escape_string($connect, $_POST['id']);
  
      $query = "UPDATE produto SET nome = '$nome', preco = '$preco' WHERE id = '$id'";

    if(mysqli_query($connect, $query)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";  // sessão para exibir as mensagens de sucesso ou erro
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: ../index.php');
    endif;
endif;