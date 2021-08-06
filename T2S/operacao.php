<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style4.css">
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
            
            $sql = "SELECT * FROM movimentacao ORDER BY id_movimentacao";
            $result = mysqli_query($conn, $sql);
            
            if(!empty($_GET['operacao'])){echo $_GET['operacao'];}

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="tabela">';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Id</th>';
                                echo '<th>Movimentação</th>';
                                echo '<th>Data Inicío</th>';
                                echo '<th>Data Fim</th>';
                                echo '<th>Número Contêiner</th>';
                                echo '<th colspan="2">Operações</th>';
                            echo '</tr>';
                        echo '</thead>';
                        // output data of each row
                        $id = 0;
                        $cont = 1;
                        while($row = mysqli_fetch_assoc($result)) {   
                        $id = $id + $cont;  
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row['id_movimentacao'].'</td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                                echo '<td>'.$row['data_inicio'].'</td>';
                                echo '<td>'.$row['data_fim'].'</td>';
                                echo '<td>'.$row['fk_numero_conteiner'].'</td>';
                                echo '<td><a href="operacao_alterar.php?del='.$row['id_movimentacao'].'">Atualizar</a></td>';
                                echo '<td><a href="operacao_excluir.php?del='.$row['id_movimentacao'].'">Excluir</a></td>';
                            echo '</tr>';
                        echo '</tbody>';      
                        }
                    echo '</table>';
                echo '</div>'; 
            }else {
            
            }      
            mysqli_close($conn);
        ?>
        <div class="relatorio">
            <a href="relatorio.php"><h1>Relatorio</h1></a>
        </div>
        
    </main>
</body>
</html>