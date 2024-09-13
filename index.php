<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <!-- Link do Bootstrap para estilos e mensagens de erro -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro de Aluno</h1>

        <!-- Verificação de erros de validação -->
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid_name') {
            echo '<div class="alert alert-danger">Por favor, insira um nome válido.</div>';
        }
        ?>

        <form action="formulario.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Aluno:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="serie">Série:</label>
                <select id="serie" name="serie" required>
                    <option value="">Selecione a Série</option>
                    <option value="1º Ano">1º Ano</option>
                    <option value="2º Ano">2º Ano</option>
                    <option value="3º Ano">3º Ano</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Curso:</label>
                <select id="curso" name="curso" required>
                    <option value="">Selecione o Curso</option>
                    <option value="Informática">Informática</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                    <option value="Administração">Administração</option>
                    <option value="Enfermagem">Enfermagem</option>
                    <option value="Segurança do Trabalho">Segurança do Trabalho</option>
                    <option value="Comércio Exterior">Comércio Exterior</option>
                    <option value="Base Comum">Base Comum</option>
                </select>
            </div>

            <div class="form-group">
                <label for="escola">Escola:</label>
                <select id="escola" name="escola" required>
                    <option value="">Selecione a Escola</option>
                    <?php
                    // Buscando as escolas no banco de dados
                    $sql = "SELECT id, nome_escola FROM escolas";
                    //Executa uma consulta no banco de dados
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Busca a próxima linha de um conjunto de resultados como um array associativo
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome_escola'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhuma escola cadastrada</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
