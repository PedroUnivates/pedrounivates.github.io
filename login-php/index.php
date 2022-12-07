<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('components/js.php') ?>
</head>

<body>
    <div class="container">
        <?php include('menu.php') ?>

        <button onclick="confirmar_logout()">SAIR</button>
    </div>

</body>

</html>