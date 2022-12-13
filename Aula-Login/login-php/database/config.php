<?php

//Definição de variáveis do banco de dados
const DBDRIVE = 'mysql';
const DBHOST = 'localhost';
const DBNAME = 'univates';
const DBUSER = 'root';
const DBPASS = '';
const DBPORT = '3306'; //porta padrão do MySql é a 3306

try {
    $con = new PDO(DBDRIVE . ':host=' . DBHOST .
        ';port=' . DBPORT . ';charset=utf8;dbname=' . DBNAME, DBUSER, DBPASS);

    return $con;
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
