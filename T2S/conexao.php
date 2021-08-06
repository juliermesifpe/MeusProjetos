<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "";


    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
  ?>
 


<html>
	<body>
       <?php echo $_POST['cliente'] ?><br>
       <?php echo $_POST['numero_conteiner'] ?><br>
       <?php echo $_POST['tipo'] ?><br>
       <?php echo $_POST['situacao'] ?><br>
       <?php echo $_POST['categoria'] ?><br>

       <?php echo $_POST['movimentacao'] ?><br>
       <?php echo $_POST['data-inicio'] ?><br>
       <?php echo $_POST['data-fim'] ?><br>
	</body>
</html>

fk_id_movimentacao INT,
      FOREIGN KEY (fk_id_movimentacao) REFERENCES movimentacao (id_movimentacao)

$movimentacao = $_POST['movimentacao'];
    $data_inicio = $_POST['data-inicio'];
    $data_fim = $_POST['data-fim'];
 
$sql = "INSERT INTO movimentacao (movimentacao, data_inicio, data_fim)
    VALUES ('$movimentacao', '$data_inicio', '$data_fim')";
 
     if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
     } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

    

                ?>   
            <div class="tabela">
            <table>
                <thead>
                    <th hidden>Id</th>
                    <th>Cliente</th>
                    <th>Número Contêiner</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Categoria</th>
                    <th colspan="2">Contêiner</th>
                    <!--<th>Operações</th>-->
                </thead>
                <tbody>
                    <tr>
                        <td hideen><?php echo $row['fk_id_movimentacao'] ?></td>
                        <td><?php echo $row['cliente'] ?></td>
                        <td><?php echo $row['numero_conteiner'] ?></td>
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['situacao'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                        <td><a href="cadastro_atualizar.php">Atualizar</a></td>
                        <td><a href="excluir.php?=<?php echo $row['cliente'] ?>">Deletar</a></td>
                        <!--<td><a href="">Realizar</a></td>-->
                    </tr>
                </tbody>
            <table>
            </div>
        <?php

        
?>


echo '<td><a href="operacao_alterar.php?del='.$row['numero_conteiner'].'">Corrigir</a></td>';
echo '<td><a href="atualizar.php?del='.$row['numero_conteiner'].'">Excluir</a></td>'; 


echo '<td><a href="operacao_realizar.php?del='.$row['numero_conteiner'].'">Realizar</a></td>';


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
                    <li><a href="movimentacao.php">Movimentação</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
    
        <div class="formulario">
            <form action="operacao_incluir.php" method="post">

                <section>
                    <h1>Corrigir Operação</h1>

                    <label for="numero_conteiner">Número do contêiner:</label>
                    <input value='<?php echo $row['fk_numero_conteiner']; ?>' disabled>
                    <input type="hidden" name="fk_numero_conteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" maxlength="11" maxlength="11" value='<?php echo $row['fk_numero_conteiner']; ?>'>
                    
                    <label for="movimentacao"> Selecione o Tipo de Movimentação:</label>
                    <select name="movimentacao" value='<?php echo $row['movimentacao']; ?>'>
                        <option Value="Nenhuma">Nenhuma</option>
                        <option value="Embarque">Embarque</option>
                        <option value="Descarga">Descarga</option>
                        <option value="Gate In">Gate In</option>
                        <option value="Gate out">Gate out</option>
                        <option value="Posicionamento">Posicionamento</option>
                        <option value="Pilha">Pilha</option>
                        <option value="Pesagem">Pesagem</option>
                        <option value="Scanner">Scanner</option>
                    </select>

                    <label for="data_inicio">Data e Hora do Início:</label>
			        <input type="datetime-local" name="data_inicio" placeholder="" value='<?php echo $row['data_inicio']; ?>'>
                    
                    <label for="data_fim">Data e Hora do Fim:</label>
			        <input type="datetime-local" name="data_fim" placeholder="" value='<?php echo $row['data_fim']; ?>'>
                </section>

                <div class="botoes">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>