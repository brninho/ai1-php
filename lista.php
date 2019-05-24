<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina inicial do Projeto</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">  </script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    
    <script type="text/javascript" charset="utf8" 
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script type="text/javascript" charset="utf8" 
      src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


    <script>

      $(document).ready(function(){
        $('#table_id').DataTable();
      });
  </script>


</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1">Sistema Web PHP</span>
  <a href="index.php" class="btn btn-primary"> Home </a>
  
</nav>
     <div class="jumbotron">
           <h3> Lista de Produtos cadastrados </h3> 
           <hr />

           <?php
            $dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
            $user = 'postgres';
            $password = '';

            try {
            $dbh = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            }

            $sql = 'SELECT * FROM produto order by preco';

            ?>



           <table class="table table-light "  id="table_id" >
            <thead>
                <tr>
                <th >Codigo</th>
                <th >Nome</th>
                <th >Preço</th>
                <th >Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 
                 foreach ($dbh->query($sql) as $row) {
                     ?>
                    
                  <?php  echo "<tr><td>" .$row['codigo']. "</td>"; ?>
                  <?php  echo "<td>" .$row['nome']. "</td>"; ?>
                  <?php  echo "<td>" .$row['preco']. "</td>"; ?>
                  <?php  echo '<td> <a class="btn btn-danger" href="excluir.php?codigo='.$row['codigo'].'" onclick="return window.confirm(`Deseja reamente excluir o produto ? `);" > Excluir </a>'; ?>
                  <?php  echo "|  <a class='btn btn-primary' href='cadastrop.php?codigo=".$row['codigo']."'  > Alterar </a> </td></tr>"; ?>
             
             
                <?php
                }
                ?>
                

            
            </tbody>

            </table>
  
            
                <?php 
                if (isset($_GET["msg"])) {
                    echo  $_GET["msg"];
                }
                ?>

</div>

</body>


<html>