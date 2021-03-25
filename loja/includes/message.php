<?php
// Sessão
session_start();
if(isset($_SESSION['mensagem'])): ?>  <!--- verifica se existe uma sessão chamada mensagem -->

<script>
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});  // script em javascript para chamar a mensagem
    };
</script>

<?php
endif;
//session_unset(); //limpar a sessão depois de exibida
?>