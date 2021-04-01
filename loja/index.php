<?php
// Conexão db e cabeçalho/rodapé
require_once 'php_action/db-connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';    //busca o session o o javascript do TOAST = mensagens de exluir e adiciona
include_once 'includes/funcoes.php';
?>

<?php
// Verificação se o usuário esta logado
if(!isset($_SESSION['logado'])):
    header('Location: login/index.php');
endif;

// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <h1> Olá <?php echo $dados['nome']; ?> </h1>
                        
</body>
</html>


<div class='row'>
    <div class="col s12 m8 push-m2">
        <h3 class="light"> Produtos Loja </h3>
            <table class="stripped">
                <thead>
                    <tr>
                        <th>Nome </th>
                        <th>Preço </th>
                        <th>Editar </th>
                        <th>Excluir </th>
                    </tr>
                </thead>
                
                <tbody>
                <a href="produto-formulario.php" class="btn">Adicionar Produto</a>
                    <?php
                        $sql = "SELECT * FROM produto";
                        $result = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($result) > 0):
                    
                        while ($dados = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?= reais ($dados['preco']) ?></td> <!-- chamando a funcao 'reais' que forma em formato de moeda BRL-->

                        <td><a href="editar-produto.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        </i></a></td>

                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        </i></a></td>

                        <!-- Modal Structure MENSAGENS QUE APARECEM NA TELA -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                <h4>Opa !!</h4>
                                <p>Tem certeza que deseja excluir esse produto?</p>
                            </div>
                            <div class="modal-footer">
                                
                                <form action="php_action/delete.php" method="POST">  <!--Botão que chama o arquivo que deleta no banco de dados -->
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>

                            </div>
                            </div>
                    </tr>

                 <?php 
                 endwhile; //fechando o while
                       else: ?>  <!-- tabela exibida em caso de ausencia de dados -->               
                       <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>

                       <?php
                       endif;
                       ?>

                </tbody>
          </table>
          
      </div>  
  </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>                 
