<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Create database
    $sql = "CREATE DATABASE operacoes DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
    
    if (mysqli_query($conn, $sql)) {
    echo "1Database created successfully <br>";
    } 
    else {
    echo "2Error creating database: " . mysqli_error($conn) . "<br>";
    }

    // Close connection
    mysqli_close($conn);

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error()) . "<br>";
    }

    // Create table
      $sql = "CREATE TABLE conteiner (
      cliente VARCHAR(50) NOT NULL,
      numero_conteiner VARCHAR(11) PRIMARY KEY NOT NULL,
      tipo INT NOT NULL,
      situacao VARCHAR(5) NOT NULL,
      categoria VARCHAR(10) NOT NULL
      )";
     
     if (mysqli_query($conn, $sql)) {
        echo "3Table conteiner created successfully <br>";
      } 
      else {
        echo "4Error creating table: " . mysqli_error($conn) . "<br>";
      }

    // Create table
    $sql = "CREATE TABLE movimentacao (
    id_movimentacao INT AUTO_INCREMENT PRIMARY KEY,
    movimentacao VARCHAR(50) NOT NULL,
    data_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    data_fim TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    fk_numero_conteiner VARCHAR(11) NOT NULL,
    FOREIGN KEY (fk_numero_conteiner) REFERENCES conteiner (numero_conteiner)
    )";

    if (mysqli_query($conn, $sql)) {
      echo "5Table movimentacao created successfully <br>";
    } 
    else {
      echo "6Error creating table: " . mysqli_error($conn) . "<br>";
    }
    
    // Close connection
    mysqli_close($conn);
?>



