<?php
require_once 'db-connect.php';
require_once 'cabecalho.php';
?>
  
    <?php
    $nome = $_GET["nome"];
    $preco = $_GET["preco"];

    function insereProduto($connect, $nome, $preco) {
        $query = "insert into produto (nome, preco) values ('{$nome}', {$preco})";
        $resultadoDaInsercao = mysqli_query($connect, $query);
        return $resultadoDaInsercao;
    }
    

    if(insereProduto($connect, $nome, $preco)) {  // CHECKA SE OS CAMPOS FORAM PREENCHIDOS, SE SIM FINALIZA A CONEXÃO E ADICIONA OS ITENS NO BANCO
    ?>    
        <p class="text-success">
            Produto: <?= $nome; ?>, preco: <?= $preco; ?> - adicionado com sucesso!
        </p>    
    <?php    
    }   else {  // SENÃO PREENCHER OS ITENS NO BANCO RETORNA ERRO E NÃO ADICIONA NADA NO BANCO DA DADOS
    ?>
        <p class="text-danger">  
            ERRO - O produto não foi adicionado!   
        </p>
    <?php
    }            
    ?>
<?php include("rodape.php"); ?>  <!-- INCLUIR O CODIGO DO RODAPÉ-->