<?php
session_start();

//limpar as variáveis de sessão
unset($_SESSION["logado"]);
unset($_SESSION["usuario"]);

header('Location: ../login.php');

?>