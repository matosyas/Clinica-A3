<?php

$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'clinica'; 


$mysqli = new mysqli($host, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die('Erro de conexão: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>