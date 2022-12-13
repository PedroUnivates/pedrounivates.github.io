<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

//verifica se o tipo não está definido
if (isset($_GET['tipo']) == false) {
    header('Location: ../index.php');
    exit();
}

$tipo = $_GET['tipo'];

//CADASTRO DE CLIENTES
if ($tipo == 'cliente') {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $dt = $_POST["dt"];


    if (!isset($dt) || $dt == '') {
        $_SESSION['erro'] = "Informe a Data de nascimento do cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET dtnasc = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$dt, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome) VALUES(?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$dt, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    }

    if (!isset($tel) || $tel == '') {
        $_SESSION['erro'] = "Informe um telefone para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET telefone = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$tel, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome) VALUES(?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$tel, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    }

    if (!isset($email) || $email == '') {
        $_SESSION['erro'] = "Informe um email para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET email = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$email, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome) VALUES(?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$email]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    }


    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe um nome para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET nome = ? and email = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome) VALUES(?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome]);
        

        if ($return) {
            $_SESSION['sucesso'] = "Cliente incluído com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    }

} else {
    header('Location: ../index.php');
    exit();
}
