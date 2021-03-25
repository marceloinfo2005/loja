<?php
// Encerrando a sessão
session_start();
session_unset();
session_destroy();
header('Location: index.php');  //devolve o usuário para a página de login