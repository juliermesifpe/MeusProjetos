<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

     $cliente = $_POST['cliente'];
     $tipo = $_POST['tipo'];
     $situacao = $_POST['situacao'];
     $categoria = $_POST['categoria'];
     $numero_conteiner = $_POST["numero_conteiner"];
     
        
     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
    
     // Check connection
     if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     }
     
     $sql = "UPDATE conteiner SET cliente='$cliente', numero_conteiner='$numero_conteiner', tipo='$tipo', situacao='$situacao', categoria='$categoria' WHERE numero_conteiner='$numero_conteiner'";
 
     if (mysqli_query($conn, $sql)) {
         header('Location: movimentacao.php?movimentacao=Atualização de contêiner realizado com sucesso!');
     } else {
         header('Location: movimentacao.php?movimentacao=Atualização de contêiner não realizado!');
     }
 
     mysqli_close($conn);
    
   
?>