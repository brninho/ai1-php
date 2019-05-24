<?php
$dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
$user = 'postgres';
$password = '';

try {
$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
} 


$sql = 'SELECT * FROM usuario ORDER BY login';
    echo "<table border=1>
    <thead>
    <tr> 
    <th> Login</th>  
    <th> Senha </th>
    </tr>
    </thead>
    <tbody>
    ";

    foreach ($dbh->query($sql) as $row) {

        echo "<tr><td>" .$row['login']. "</td>";
        echo "<td>" .$row['senha']. "</td> </tr>";

    }

    echo "</tbody> </table>";

    

