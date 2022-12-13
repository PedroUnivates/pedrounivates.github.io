<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
}

//abrir uma conexão com o banco de dados
$conexao = require('database/config.php');

$cliente = null;
if (isset($_GET["id"])) { //isset = Verifica se existe o parametro ID na URL

    $id = $_GET["id"];

    $sql = "SELECT * FROM clientes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);

    $stmt->execute(); //executa o SQL com os parametros passados acima
    $retorno = $stmt->fetch(PDO::FETCH_ASSOC); //armazena na variável retorno, os dados obtidos da consulta
    if ($retorno) {
        $cliente = $retorno;
    }
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

        <div class="row">
            <div class="col-sm-12">

                <form method="post" action="actions/actions.php?tipo=cliente">

                    <input type="hidden" class="form-control" name="id" 
                    value="<?php echo ($cliente != null ? $cliente['id'] : '') ?>">
                    
                    <div class="row mb-3">
                         <div class="col-sm-6 col-md-4">                    
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo ($cliente != null ? $cliente['nome'] : '') ?>">
                        </div>
                                      
                         <div class="col-sm-6 col-md-4">                   
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo ($cliente != null ? $cliente['email'] : '') ?>">
                        </div>

                        <div class="col-sm-6 col-md-4">                   
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="tel" placeholder="Telefone" value="<?php echo ($cliente != null ? $cliente['telefone'] : '') ?>">
                        </div>

                        <div class="col-sm-6 col-md-4">                   
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" name="dt" placeholder="Dt" value="<?php echo ($cliente != null ? $cliente['dtnasc'] : '') ?>">
                        </div>


                    </div>
                    <input class="btn btn-warning" value="Limpar" type="reset">
                    <button class="btn btn-primary" type="submit">Salvar</button>

                </form>

            </div>
        </div>
    </div>

</body>

</html>