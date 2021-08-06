<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "operacoes";

    $del = $_GET['del'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM conteiner WHERE numero_conteiner='$del'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
    
?>
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
                    <li><a href="operacao.php">Operações</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="formulario">
            <form action="atualizacao.php" method="post">
               <section>
                    <h1>Atualizar Contêiner</h1>
                    
                    <label for="numero_conteiner">Número do contêiner:</label>
                    <input value='<?php echo $row['numero_conteiner']; ?>' disabled>
                    <input type="hidden" name="numero_conteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" maxlength="11" maxlength="11" value='<?php echo $row['numero_conteiner']; ?>' >

			        
                    <label for="cliente">Cliente:</label>
			        <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA"  value='<?php echo $row['cliente']; ?>' require>
                    
                    <label for="tipo">Tipo:</label>
			        <input type="text" name="tipo" placeholder="Ex: 20 ou 40" minlength="2" maxlength="2" value='<?php echo $row['tipo']; ?>' require>
                    
                    <label for="situacao">Status:</label>
			        <input type="text" name="situacao" placeholder="Ex: Cheio ou Vazio" minlength="5" maxlength="5" value='<?php echo $row['situacao']; ?>' require>
                    
                    <label for="categoria">Categoria:</label>
			        <input type="text" name="categoria" placeholder="Ex: Importação ou Exportação" minlength="10" maxlength="10" value='<?php echo $row['categoria']; ?>'require>
                </section>

                <div class="atualizar">
                    <input type="submit" value="Atualizar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>