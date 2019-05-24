<?php
$dsn = 'pgsql:dbname=testdb;host=127.0.0.1';
$user = 'root';
$password = '';

try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
} 

$count = $dbh->exec("insert into usuario(login, senha) values('admin','123') ");
echo "<p>$count registro foi incluído</p>";

$sql = 'SELECT * FROM usuario ORDER BY login';
foreach ($dbh->query($sql) as $row) {
print $row['login'] . "\t";
print $row['senha'] . "\t";
?>