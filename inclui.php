<?php
$dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
$user = 'postgres';
$password = '';

try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
} 

$login  = $_GET['login'];
$senha = $_GET['senha'];


$count = $dbh->exec("insert into usuario(login, senha) values('$login','$senha') ");
echo "<p>$count registro foi incluído</p>";
