<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    $cliente = $_POST['cliente'];
    $numero_conteiner = $_POST['numero_conteiner'];
    $tipo = $_POST['tipo'];
    $situacao = $_POST['situacao'];
    $categoria = $_POST['categoria'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // INSERT INTO
    $sql = "INSERT INTO conteiner (cliente, numero_conteiner, tipo, situacao, categoria)
    VALUES ('$cliente', '$numero_conteiner', '$tipo', '$situacao', '$categoria')";
 
     if (mysqli_query($conn, $sql)) {
        header('Location: index.php?index=Cadastro de contêiner realizado com sucesso!');
     } else {
        header('Location: index.php?index=Cadastro de contêiner não realizado!');
     }
     mysqli_close($conn);
?>