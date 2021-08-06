<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    //$data_inicio = date("d-m-Y H:i:s", strtotime($_POST['data_inicio']));
   // $data_fim = date("d-m-Y H:i:s", strtotime($_POST['data_fim']));
    $movimentacao = $_POST['movimentacao'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $numero_conteiner = $_POST['numero_conteiner'];

   

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // INSERT INTO
    $sql = "INSERT INTO movimentacao (movimentacao, data_inicio, data_fim, fk_numero_conteiner)
    VALUES ('$movimentacao', '$data_inicio', '$data_fim', '$numero_conteiner')";
 
     if (mysqli_query($conn, $sql)) {
        header('Location: movimentacao.php?movimentacao=Operação realizado com sucesso!');
     } else {
        header('Location: movimentacao.php?movimentacao=Operação não realizado!');
     }
     mysqli_close($conn);
?>