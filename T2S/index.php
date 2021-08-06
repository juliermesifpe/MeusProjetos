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
        <?php if(!empty($_GET['index'])){echo $_GET['index'];}?>
        
        <div class="formulario">
            <form action="incluir.php" method="post">
               <section>
                    <h1>Cadastrar Contêiner</h1>

                    <label for="numero_conteiner">Número do contêiner:</label>
			        <input type="text" name="numero_conteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" minlength="11" maxlength="11" required>
                   
                    <label for="cliente">Cliente:</label>
			        <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA" minlength="2" maxlength="30" required>
                    
                    <label for="tipo">Tipo:</label>
			        <input type="number" name="tipo" placeholder="Ex: 20 ou 40" minlength="2" maxlength="2" required>
                    
                    <label for="situacao">Status:</label>
			        <input type="text" name="situacao" placeholder="Ex: Cheio ou Vazio" minlength="5" maxlength="5" required>
                    
                    <label for="categoria">Categoria:</label>
			        <input type="text" name="categoria" placeholder="Ex: Importação ou Exportação" minlength="10" maxlength="10" required>
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