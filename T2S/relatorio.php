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
            
            $sql = "SELECT movimentacao, COUNT(*) AS C FROM movimentacao GROUP BY movimentacao ";
            
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                
                echo '<div class="tabela">';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                             echo '<th>Cliente</th>';
                                echo '<th>Movimentacao</th>';
                                echo '<th>Quantidade</th>';
                            echo '</tr>';
                        echo '</thead>';
                        // output data of each row
                       
                        while($row = mysqli_fetch_assoc($result)){
                        
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>';
                                echo'</td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                                echo '<td>'.$row['C'].'</td>';
                            echo '</tr>';
                        echo '</tbody>';      
                        }
                    echo '</table>';
                echo '</div>';
                
                echo '<div class="tabela">';
                echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                            echo '<th>Exportação</th>';
                                echo '<th>Importação</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td></td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                                echo '<td>'.$row['C'].'</td>';
                            echo '</tr>';
                    echo '</table>';
                echo '</div>';
            }else {
            
            }      
            mysqli_close($conn);
        ?>
    </main>
</body>
</html>