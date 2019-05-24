<?php
$dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
$user = 'postgres';
$password = '';

try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
} 

$nome  = $_POST['nome'];
$preco = $_POST['preco'];

if (isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"];

    $msg = "Produto atualizado com sucesso!";

    $count = $dbh->exec("UPDATE produto set nome = '$nome'  , preco = '$preco'  where codigo =".$codigo);

    if($count > 0){
        header('Location: lista.php?msg='.$msg);
        exit();
    }
    

}


$count = $dbh->exec("insert into produto(nome, preco) values('$nome','$preco') ");

$msg = "Produto cadastrado com sucesso!";

if($count > 0){
    header('Location: cadastrop.php?msg='.$msg);
    exit();
}


?>
