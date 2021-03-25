<?php


// Conexão com banco e cabeçalho da página

include_once 'php_action/db-connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';

// Verificação se o usuário esta logado
if(!isset($_SESSION['logado'])):
    header('Location: login/index.php');
endif;


if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $query = "SELECT * FROM produto WHERE id = '$id'";
    $resultado = mysqli_query($connect, $query);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Produto </h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id'];?>">

    <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
            <label for="nome"> Nome</label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="preco" id="preco" value="<?php echo $dados['preco'];?>">
            <label for="preco"> Preco</label>
        </div>
    
            <button type ="submit" name="btn-editar" class="btn"> Atualizar </button>
            <a href="index.php" class="btn green"> Lista de Produtos </a>
        </form>
        </div>
    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>


