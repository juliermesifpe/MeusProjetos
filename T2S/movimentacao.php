<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <header>
        <div class="cabecalho">
            <img src="logo.jpeg" alt="logo" class="logo">
            <nav class="navegacao">
                <ul>
                    <li><a href="index.php">Cadastro</a></li>
                    <li><a href="movimentacao.php">Contêiner</a></li>
                    <li><a href="operacao.php">Operações</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <?php
            $servername = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "operacoes";
        
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM conteiner";
            $result = mysqli_query($conn, $sql);
            
            if(!empty($_GET['movimentacao'])){echo $_GET['movimentacao'];}

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="tabela">';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Cliente</th>';
                                echo '<th>Número do Contêiner</th>';
                                echo '<th>Tipo</th>';
                                echo '<th>Status</th>';
                                echo '<th>Categoria</th>';
                                echo '<th colspan="2">Contêiner</th>';
                                echo '<th colspan="3">Operações</th>';
                            echo '</tr>';
                        echo '</thead>';
                        // output data of each row
                        $id = 0;
                        $cont = 1;
                        while($row = mysqli_fetch_assoc($result)) {   
                        $id = $id + $cont;  
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row['cliente'].'</td>';
                                echo '<td>'.$row['numero_conteiner'].'</td>';
                                echo '<td>'.$row['tipo'].'</td>';
                                echo '<td>'.$row['situacao'].'</td>';
                                echo '<td>'.$row['categoria'].'</td>';
                                echo '<td><a href="atualizar.php?del='.$row['numero_conteiner'].'">Atualizar</a></td>';
                                echo '<td><a href="excluir.php?del='.$row['numero_conteiner'].'">Excluir</a></td>';
                                echo '<td><a href="operacao_realizar.php?del='.$row['numero_conteiner'].'">Realizar</a></td>';
                            echo '</tr>';
                        echo '</tbody>';      
                        }
                    echo '</table>';
                echo '</div>'; 
              
            }else {
            
            }      
            mysqli_close($conn);
        ?>
    </main>
</body>
</html>