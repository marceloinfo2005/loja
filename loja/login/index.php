<?php
// Conexão DB

require_once('/var/www/html/loja/php_action/db-connect.php');

//Sessão

session_start();

// Botão enviar
?>

<?php
if(isset($_POST['btn-entrar'])): //dando comando ao botão
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);

        if(empty($login) or empty($senha)):  //se os campos estiverem vazios, retorna o rro
            $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";

            else:
            $sql = "SELECT login FROM usuarios WHERE login = '$login'"; //select para buscar o Login no banco sendo o mesmo login  vindo o formulário.
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0):
                $senha = md5($senha); //descriptar a senha md5 no banco
                $sql ="SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'"; // select verifica se a Senha digitada é a mesma da senha no banco
                $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) == 1): //se existir uma correspondencia no banco
                        $dados = mysqli_fetch_array($resultado);
                        mysqli_close($connect);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        

                        header('Location: /loja/index.php');  // redireciona para a tela do sistema
                    else:
                     $erros[] = " <li> Usuário e senha não conferem </li>";
                endif;    
            else:
                $erros[] = "<li> Usuário inexistente </li>";
            endif;

        endif;    
endif;
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/login_style.css">
<body>
    
<?php
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
endif;
?>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1> Login Loja </h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>Usuário</p> 
        <input type="text" name="login" placeholder="Digite o usuário"><br>
        <p>Senha</p>
        <input type="password" name="senha" placeholder="Digite a senha"><br>
       <!-- <button type="submit" name="btn-entrar" value="Login"> </button> -->
        <input type="submit" name="btn-entrar" value="Login">
        </form>
    </div>
   

</body>
</head>
</html>