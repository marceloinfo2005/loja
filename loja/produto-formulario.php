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
                
                <div class="row">
                <div class="col s12 input-field">
                    <i class="material-icons prefix">add_circle_outline</i>
                    <input type="text" name="nome" id="nome" maxlenght="20" required placeholder="Digite o nome do produto"/>
                    <label for="nome"> Nome do Produto</label>
                </div>
                </div>  
                
                <div class="row">
                    <div class="col s12 input-field">
                        <i class="material-icons prefix">attach_money</i>
                        <input type="number" step="0.01" name="preco" id="preco" required placeholder="Digite o preço do produto"/>
                        <label for="nome"> Preço</label> 
                    </div>
                </div>    
                <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">wrap_text</i>
                                         <textarea type="text" name="descricao" id="descricao" class="materialize-textarea" placeholder="Digite a descrição do produto" required>  </textarea>
                                        <label for="textarea1">Descrição do Produto</label>
                                    </div>
                                </div>
                            </form>
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