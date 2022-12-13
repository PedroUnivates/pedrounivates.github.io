<?php
session_start();
//abrir uma conexão com o banco de dados
$conexao = require('../database/config.php');

$usuario = $_POST["usuario"]; //name do formulário da requisição
$senha = $_POST["senha"]; //name do formulário da requisição

$sql = " SELECT nome FROM usuarios 
        WHERE login = :login 
        AND senha = md5(:senha) ";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(":login", $usuario);
$stmt->bindValue(":senha", $senha);

$stmt->execute(); //executa o SQL com os parametros passados acima
$retorno = $stmt->fetch(PDO::FETCH_ASSOC); //armazena na variável retorno, os dados obtidos da consulta
if($retorno){ //retorno está preenchido e não é falso?
    $_SESSION["logado"] = true;
    $_SESSION["usuario"] = $retorno["nome"];
    $_SESSION["usuario"] = $retorno["email"];
    header('Location: ../index.php');
}else{
    $_SESSION["erro"] = "Dados de acesso inválidos";
    header('Location: ../login.php'); //navega até a tela de login
}


//pegar os dados que vieram no formulário
//e testar se são válidos