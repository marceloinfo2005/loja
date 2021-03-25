<?php 

include_once 'includes/header.php'; 
include_once 'includes/message.php';

// Verificação se o usuário esta logado
if(!isset($_SESSION['logado'])):
    header('Location: login/index.php');
endif;

?>

       <div class="row">
            <div class="col s12 m6 push-m3">
            <h3 class="light"> Novo Produto </h3>
            <form action="php_action/adiciona-produto.php" method="POST">
                
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto">
                    <label for="nome"> Nome</label>
                </div>  

            <div class="input-field col 12">
            <input type="number" step="0.01" name="preco" id="preco" placeholder="Digite o preço do produto">
                    <label for="nome"> Preço</label> 
                </div>

                <div class="row">
                <form class="col s12">
                    <div class="row">
                    <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">Descricao do Produto</label>
                    </div>
                    </div>
                </form>
  

        <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
        <a href="index.php" class="btn green"> Lista de Produtos </a>
       </form>

   </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>