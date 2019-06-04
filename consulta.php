<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> Painel do Sistema</title>
</head>
<body>
   <div class="container">
       <h3> Consultar Cliente</h3>
       <form style="width:500px;">
        Nome:
        <input type="text" name="nome" 
          class="form-control">
          <input type="submit" value="Buscar" 
          class="btn btn-info">     
           
           </form><hr>
           
           
           
           <?php
       
       if(isset($_GET["nome"]))
       
       
       {$nome = $_GET["nome"];
        include_once 'conexao.php'; 
        $sql = "SELECT * FROM clientes WHERE nome LIKE '$nome%' order by nome";   
       
       
       $result = mysqli_query ($con, $sql);
       
       $total = mysqli_num_rows($result);
       
          if ($total > 0){
              echo"<table class= 'table'>
              <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone</th>
         
              
              </tr>
              ";
              
              while($row=mysqli_fetch_array($result)){
                  echo"<tr>";
                  echo"<td>".$row["nome"]."</td>";
                  echo"<td>".$row["email"]."</td>";
                  echo"<td>".$row["telefone"]."</td>";
                 
                  
                  echo"</tr>";
              }
                  echo "</table>"; 
                 echo"Total de registros:". $total;  
           }else{
              
              echo"não há pessoas com esse nome";
          }         
        mysqli_close($con);   
        
       }
         
         
            
       
          ?>
       
       
   </div>
   <a href="index.php" class="btn btn-primary">Página Inicial</a>
</body>
</html>

