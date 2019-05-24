<?php
$dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
$user = 'postgres';
$password = '';

try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
} 

$codigo  = $_GET['codigo'];

$count = $dbh->exec("delete from produto where codigo = ".$codigo);

$msg = "Deletado com sucesso!";

if($count > 0){
    header('Location: lista.php?msg='.$msg);
    exit();
}


?>
