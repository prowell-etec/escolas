<?php
// Verifica se o nome foi passado via GET
if (!isset($_GET['nome'])) {
    header("Location: index.php");
    exit;
}

$nome = urldecode($_GET['nome']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boas-vindas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_welcome.css">
</head>
<body>
    <div class="menu">
        <a href="index.php">Voltar à página inicial</a>
    </div>

    <h1>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h1>
    <p>Você foi cadastrado com sucesso!</p>
</body>
</html>