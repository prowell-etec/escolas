<?php
include 'conexao.php';

// Função para validar nome (apenas letras e espaços)
function validarNome($nome) {
    return preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $nome);
}

// Captura dos dados do formulário
$nome = $_POST['nome'];
$serie = $_POST['serie'];
$curso = $_POST['curso'];
$escola = $_POST['escola'];

// Verificação de validação
if (!validarNome($nome)) {
    header("Location: index.php?error=invalid_name");
    exit;
}

// Inserindo os dados no banco de dados
$sql = "INSERT INTO alunos (nome_aluno, serie, curso, escola_id) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nome, $serie, $curso, $escola);

if ($stmt->execute()) {
    header("Location: boas_vindas.php?nome=" . urlencode($nome));
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>