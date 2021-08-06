
<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    $numero_conteiner = $_GET['del'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // sql to delete a record
    $sql = "DELETE FROM movimentacao WHERE id_movimentacao='".$_GET['del']."'";

    if (mysqli_query($conn, $sql)) {
        header('Location: operacao.php?operacao=Cadastro excluído com sucesso!');
    } else {
        header('Location: operacao.php?operacao=Cadastro não foi excluído!');
    }
    mysqli_close($conn);
?>