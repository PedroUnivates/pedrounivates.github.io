<?php
session_start();
if (isset($_SESSION['logado'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            border-radius: 10px;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-radius: 10px;
        }
    </style>

    <?php include('components/js.php') ?>
</head>

<body>
    <?php
    if (isset($_SESSION['erro'])) {
        echo "<script>mensagem_erro('" . $_SESSION['erro'] . "')</script>";
        unset($_SESSION['erro']);
    }
    ?>
    <form class="form-signin" method="post" action="actions/actions_login.php">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="logo_bootstrap" width="72" height="72">
        <h3 class="mb-3 font-weight-normal">Acesso ao sistema</h3>

        <input type="text" name="usuario" class="form-control mb-2" placeholder="Usuário" required autofocus>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>

        <button class="btn btn-primary" type="submit">Entrar</button>
    </form>

</body>

</html>