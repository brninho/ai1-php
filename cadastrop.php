<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina inicial do Projeto</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">  </script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

  


</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1">Sistema Web PHP</span>
  <a href="index.php" class="btn btn-primary"> Home </a>
  
</nav>
<div class="jumbotron">
    
  
      <h3> Formulário para cadastro de Produtos  </h3>
      <hr />

      <form action="receber.php" method="POST">


      <?php 
    
    if (isset($_GET["codigo"])) {
       
        $dsn = 'pgsql:dbname=testedb;host=127.0.0.1';
        $user = 'postgres';
        $password = '';

        try {
        $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        } 

        $codigo  = $_GET['codigo'];
        $sql = 'SELECT * from produto where codigo ='.$codigo ;

        $stmt = $dbh->prepare($sql); 
        $stmt->execute(); 
        $resultado = $stmt->fetch();       
        
        ?>
        
        <input type="hidden"  name="codigo" value="<?php  echo $codigo ?>" />


        
    <?php } ?>

      <div class="form-group row">
             <label for="nome" class="col-sm-1"> Nome </label>
             <div class="col-sm-5">
                   <input type="text" name="nome" class="form-control" id="nome"
                    value="<?php   if (isset($resultado["nome"])){
                            echo $resultado["nome"];
                       }  ?>" />
             </div>
        </div>

        <div class="form-group row">
             <label for="preco" class="col-sm-1" > Preço </label>
             <div class="col-sm-5">
                   <input  name="preco" class="form-control" id="preco"  type="number" step="any"
                   
                   value="<?php   if (isset($resultado["preco"])){
                            echo $resultado["preco"];
                       }  ?>" />
                   

             </div>
        </div>

        <div class="form-group row">
             <div class="col-sm-2 col-form-label">

             </div>
            <div class="col-sm-4">
             <input type="submit" name="cadastrar" value="Cadastrar"
                    class="form-control btn btn-primary"/>
             </div>
        </div>

      <form>

</div>


</body>

<?php 
    
    if (isset($_GET["msg"])) {
        echo  $_GET["msg"];
    }
     
  ?>

<html>