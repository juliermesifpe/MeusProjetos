<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";
    
    $id_movimentacao = $_POST['id_movimentacao'];
     $movimentacao = $_POST['movimentacao'];
     $data_inicio = $_POST['data_inicio'];
     $data_fim = $_POST['data_fim'];
     $fk_numero_conteiner = $_POST['fk_numero_conteiner'];
        
     // Create connection
     $conn = mysqli_connect($servername, $username, $password, $dbname);
    
     // Check connection
     if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     }
     
     $sql = "UPDATE movimentacao SET movimentacao='$movimentacao', data_inicio='$data_inicio', data_fim='$data_fim' WHERE id_movimentacao='$id_movimentacao'";
 
     if (mysqli_query($conn, $sql)) {
         header('Location: operacao.php?operacao=Atualização de contêiner realizado com sucesso!');
     } else {
         header('Location: operacao.php?operacao=Atualização de contêiner não realizado!');
     }
 
     mysqli_close($conn);
    
   
?>