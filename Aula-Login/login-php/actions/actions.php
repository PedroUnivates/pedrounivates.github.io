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


    if (!isset($nome) || $nome == '') {
        $_SESSION['erro'] = "Informe um nome para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($email) || $email == '') {
        $_SESSION['erro'] = "Informe um e-mail para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($tel) || $tel == '') {
        $_SESSION['erro'] = "Informe um Telefone para o cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (!isset($dt) || $dt == '') {
        $_SESSION['erro'] = "Informe a Data de Nascimento do cliente";
        header('Location: ../clientes.php');
        exit();
    }

    if (isset($id) && $id != '') {
        $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, dtnasc = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $tel, $dt, $id]);

        if ($return) {
            $_SESSION['sucesso'] = "Cliente alterado com sucesso!";
            header('Location: ../clientes-lista.php');
            exit();
        }
    } else {
        $sql = "INSERT INTO clientes (nome, email, telefone, dtnasc) VALUES(?,?)";
        $stmt = $conexao->prepare($sql);
        $return = $stmt->execute([$nome, $email, $tel, $dt]);

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