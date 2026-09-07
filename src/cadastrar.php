<?php

require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, descricao, preco)
            VALUES (:nome, :descricao, :preco)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':preco' => $preco
    ]);

    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>

    <h1>Cadastrar Produto</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <br><br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="index.php">Voltar</a>

</body>
</html>