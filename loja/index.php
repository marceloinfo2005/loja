<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<?php
include_once 'db-connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';
?>

<div class='row'>
    <div class="col s12 m8 push-m2">
        <h3 class="light"> Produtos </h3>
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
                    <?php
                        $sql = "SELECT * FROM produto";
                        $result = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($result) > 0):
                    
                        while ($dados = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['preco']; ?></td>

                        <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        </i></a></td>

                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        </i></a></td>

                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                <h4>Opa !!</h4>
                                <p>Tem certeza que deseja excluir esse produto?</p>
                            </div>
                            <div class="modal-footer">
                                
                                <form action="delete.php" method="POST">  <!-- faz o delete no banco de dados -->
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
          <a href="produto-formulario.php" class="btn">Adicionar Produto</a>
      </div>  
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>                 
